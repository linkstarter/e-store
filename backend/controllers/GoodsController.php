<?php

namespace backend\controllers;

use Yii;
use common\models\Goods;
use common\models\GoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use common\components\Upload;
use common\models\Inventory;
use common\models\Goodsstatus;
/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Goods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();

        if ($model->load(Yii::$app->request->post())) {
            $model->g_status = Goodsstatus::DEFAULT_STATUS;
            $model->g_masterid = yii::$app->user->id;
            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->g_id]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Goods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpload()
    {
        try
        {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = new Upload();
            $info = $model->upImage();

            if($info && is_array($info))
            {
                return $info;
            }
            else
            {
                return ['code' => 1, 'msg' => 'error'];
            }
        }
        catch(\Exception $e)
        {
            return ['code' => 1, 'msg' => $e->getMessage()];
        }
    }

    /**
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        if($model->approve())
        {
            $inventory = new Inventory();
            $inventory->g_id = $model->g_id;
            $inventory->g_masterid = $model->g_masterid;
            $inventory->inventory = $inventory::DEFAULT_INVENTORY;
            $inventory->sales_volume = $inventory::DEFAULT_SALES_VOLUME;
            if($inventory->save())
            {
                return $this->redirect(['inventory/index']);
            }
            else
            {
                echo '入库错误';
            }
            
        }
    }
}

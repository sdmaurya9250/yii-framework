<?php

namespace backend\controllers;

use common\models\Projects;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Projects models.
     *
     * @return string
     */
    public function actionIndex()
    {


        // Build the query
// $query = Projects::find()
// ->select(['projects.id','projects.customer_contact','projects.uniqueid','projects.customer_address','projects.project_name','epics_list.title'])
// ->join('JOIN', 'epics_list', 'projects.uniqueid = epics_list.projectlist1');
// // ->join('INNER JOIN', 'table3', 'table2.foreign_key = table3.id');


// // Create a data provider with the query
// $dataProvider = new ActiveDataProvider([
// 'query' => $query,
// ]);

// $query = Projects::find()
//     ->select('projects.*,epics_list.*')  // make sure same column name not there in both table
//     ->leftJoin('epics_list', 'projects.uniqueid = epics_list.projectlist1')
//     // ->where(['admins.idadm' => 33])
//     // ->with('epics_list')
//     ->asArray()
//     ->all();


       $dataProvider = new ActiveDataProvider([
            'query' =>  Projects::find()
            ->select('projects.*,epics_list.*')  // make sure same column name not there in both table
            ->leftJoin('epics_list', 'projects.uniqueid = epics_list.projectlist1')
            // ->where(['admins.idadm' => 33])
            // ->with('epics_list')
            ->asArray()
            // ->all()
       
        ]);
    // echo '<pre>';

    //     print_r($dataProvider);
    //     die;
   return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    // echo '<pre>';

    //     print_r($dataProvider->getModels());
    //     die;

        // $dataProvider = new ActiveDataProvider([
        //     'query' => Projects::find(),
        //     /*
        //     'pagination' => [
        //         'pageSize' => 50
        //     ],
        //     'sort' => [
        //         'defaultOrder' => [
        //             'id' => SORT_DESC,
        //         ]
        //     ],
        //     */
        // ]);

        //   echo '<pre>';

        // print_r($dataProvider->getModels());
        // die;

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);


        // $dataProvider = new ActiveDataProvider([
        //     // 'query' => Projects::find(),
        //     'query' => Projects::find()
        //     // ->select(['projects.id','projects.customer_contact','projects.uniqueid','projects.customer_address','projects.project_name','epics_list.title'])
        //     // ->leftJoin('epics_list','projects.uniqueid = epics_list.projectlist1')
        //     // ->leftJoin('epics_list','projects.uniqueid = epics_list.projectlist1')
        //     // ->all()
        //     /*
        //     'pagination' => [
        //         'pageSize' => 50
        //     ],
        //     'sort' => [
        //         'defaultOrder' => [
        //             'id' => SORT_DESC,
        //         ]
        //     ],
        //     */
        // ]);

        // echo '<pre>';

        // print_r($dataProvider->getModels());
        // die;

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    

    /**
     * Displays a single Projects model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Projects();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Projects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projects::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use common\models\Video;
use common\models\VideoSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\base\Security;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends Controller
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
     * Lists all Video models.
     *
     * @return string
     */
    public function actionIndex()
    {


        // $users =  Video::find()->all();
        // print_r( $posts );
     // Convert the Active Record models to an array
// $userArray = \yii\helpers\ArrayHelper::toArray($users);

// // Debug the fetched data
// Yii::debug($userArray, 'app');

        // use app\models\Post;

        // // Fetching all posts as an array
        // $posts = Post::find()->asArray()->all();
        
        // // Fetching posts with conditions
        // $posts = Post::find()
        //     ->where(['status' => 'published'])
        //     ->orderBy('created_at')
        //     ->asArray()
        //     ->all();
        
        // // Fetching a single post by ID
        // $post = Post::find()
        //     ->where(['id' => $postId])
        //     ->asArray()
        //     ->one();
        
        

        //    return  Yii::$app;

       
                // Generate a secure random password salt
            //     $salt = Yii::$app->security->generateRandomString();

            //     // Hash the password using the salt
            //     $password = 'my_password';
            //  return   $hashedPassword = Yii::$app->security->generatePasswordHash($password . $salt);

            $searchModel = new VideoSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);
     
        // $posts = $dataProvider->getModels();
        // $count = $dataProvider->getCount();
        // $count = $dataProvider->getTotalCount();

        // echo '<pre>';
        // echo $count;
        // print_r( $count);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModels' => $searchModel,
        ]);
    }

    /**
     * Displays a single Video model.
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
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Video();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                // $model->checkboxes
                // && $model->save()
              //  $postData =   $this->request->post();
               // var_dump($postData); // Debug the POST data
               // die('Stop code');

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
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $totalViews = $model->status;
        $newValue = 3;
        if ($totalViews + $newValue > 5) {
            // $this->addError($attribute, 'You have exceeded the limit.');
            return 'Hello';
        }else{
            return 'Hey';
        }

        // $columnSum = self::find()->sum('status');

        print_r(  $totalViews);

        exit;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionUpdates()
    {
        return 'Heyy';
        $model = $this->findModel($id);

        // $columnSum = self::find()->sum('status');

        // print_r($columnSum );

        // exit;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Deletes an existing Video model.
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
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

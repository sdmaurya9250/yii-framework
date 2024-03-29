<?php

namespace backend\controllers;

use common\models\Video;
use common\models\Course;
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
    public function actionTest()
    {
    //     Yii::$app->mailer->compose()
    //     ->setFrom('surendra75maurya@gmail.com')
    //     ->setTo('surendra75maurya@gmail.com')
    //     ->setSubject('Hello!')
        
    //     ->setTextBody('This is the plain text content of the email. <img src="https://www.yiiframework.com/image/logo.svg"/>')
    //     ->send();

    // echo 'Email sent successfully.';

    $message = Yii::$app->mailer->compose();
    $message->setFrom('surendra75maurya@gmail.com');
    $message->setTo('surendra75maurya@gmail.com');
    $message->setSubject('Email with Attachment');
    $message->setTextBody('This is the text content of the email.');

    // Attach a file
    // $attachmentPath = 'https://dharmakarma.net/assets/img/images/cal9.jpg';
    $message->attach($attachmentPath);

    // Send the email
    if ($message->send()) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email.';
    }
        
    }
    
    public function actionSmsTest()
    {

        return 'Hii';

    }
    public function actionCreate()
{
    $model = new Video();

    if ($this->request->isPost && $model->load($this->request->post())) {
        if ($this->request->post('Video')['check'] == 1) {

            $course = new Course();
                $course->name = 'fdsfds';
                $course->total_fees = '11222';
                $result = $course->save();
            
                if ($result) {
                    $course->user_id = 'T00' . $course->id;
                    $course->save(false); // Save the updated user_id without running validation again
                // If the course is saved successfully, you can redirect to the video view page
                return 'Success';
            } else {
                // If there is an error while saving the course, you can show an error message
                // or handle the error accordingly
                return 'Course model saving error: ' . print_r($course->errors, true);
            }
        } else {
            // The 'check' value is not 1, so return 0 or handle the condition accordingly
            return 0;
        }
    }

    // If it's not a POST request or the model is not loaded, just render the create view
    return $this->render('create', [
        'model' => $model,
    ]);
}
// In this refactored code, we use $model->check to access the 'check' attribute of the Video model. We also moved the redirection code outside the if block to ensure the redirection happens regardless of the condition's outcome. If the Course model is not saved successfully, you can show an error message or handle the error according to your requirements.






    
    
    

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

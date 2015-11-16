<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use app\services\GenreServices;
use common\models\LoginForm;
use frontend\models\ContactFormModel;
use frontend\models\PasswordResetRequestForm;
use frontend\models\SignupForm;
use frontend\models\ResetPasswordForm;

class AppController extends Controller
{

//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        return $this->render('index', ['genreOptions' => $genreOptions]);
    }

    public function actionAbout()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        return $this->render('about', ['genreOptions' => $genreOptions]);
    }

    public function actionContact()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        $model = new ContactFormModel();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
                'genreOptions' => $genreOptions
            ]);
        }
    }

    public function actionPublishhouses()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        return $this->render('publishhouses', ['genreOptions' => $genreOptions]);
    }

    public function actionGenres()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        return $this->render('genres', ['genreOptions' => $genreOptions]);
    }

    public function actionLogin()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
                'genreOptions' => $genreOptions
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionSignup()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'genreOptions' => $genreOptions
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
            'genreOptions' => $genreOptions
        ]);
    }

    public function actionResetPassword($token)
    {
        $genreOptions = self::genreServices()->getFilterOptionsGenres();
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
            'genreOptions' => $genreOptions
        ]);
    }

    protected function genreServices()
    {
        return new GenreServices();
    }
}

?>
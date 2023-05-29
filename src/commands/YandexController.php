<?php


namespace app\commands;


use app\models\subjects\Subject;
use app\services\comment\CommentFiller;
use app\services\parsers\ICommentParser;
use app\services\parsers\YandexParser;
use yii\console\Controller;
use yii\db\Expression;

class YandexController extends Controller
{

    public function __construct($id, $module, private ICommentParser $parser, private CommentFiller $commentFiller, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        echo $this->commentFiller->fillComment(
            $this->getRandomSubject(),
            $this->parser->doParse(YandexParser::YANDEX_URL)
        ) . PHP_EOL;
    }

    /**
     * Выбрать случайный субъект
    */
    private function getRandomSubject()
    {
        $classes = array_values(Subject::SUBJECT_CLASSES);
        $key = rand(0, count($classes) - 1);
        $class = $classes[$key];
        /** @var Subject $subject */
        return $class::find()->orderBy(new  Expression('rand()'))->limit(1)->one();
    }
}


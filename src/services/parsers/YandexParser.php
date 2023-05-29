<?php


namespace app\services\parsers;


use app\models\dto\CommentDto;
use GuzzleHttp\Client;
use PHPHtmlParser\Dom;
use PHPHtmlParser\Dom\HtmlNode;


class YandexParser implements ICommentParser
{
    const YANDEX_URL = 'http://web/yandex';
    const LIMIT = 3;

    public function doParse(string $url): array
    {
        $result = [];
        $content = $this->getContent($url);
        $dom = new Dom();
        @$dom->loadFromUrl(self::YANDEX_URL);

        $reviews = $dom->find('#scroll-to-reviews-list > div');

        for ($i = 0; $i < self::LIMIT; $i++) {
            /* @var HtmlNode $rev  */

            if (empty($reviews[$i])) {
                break;
            }

            $rev = $reviews[$i];

            $dls = $rev->find('dl');
            /** @var HtmlNode $dlComment */
            $dlComment = $dls[$dls->count() - 1];
            /** @var HtmlNode $dd */
            $dd = $dlComment->find('dd')[0];

            $result[] = new CommentDto(
                $rev->find('[data-auto="user_name"]')[0]->text,
                $dd->text
            );
        }

        return $result;
    }

    private function getContent(string $url): string
    {
        $client = new Client();
        $response = $client->get($url);
        try {
            return $response->getBody()->getContents();
        } catch (\Throwable $ex) {
            \Yii::error($ex->getMessage());
            return '';
        }


    }
}
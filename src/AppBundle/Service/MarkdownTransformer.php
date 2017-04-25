<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 28.03.17
 * Time: 22:19
 */

namespace AppBundle\Service;


use Doctrine\Common\Cache\Cache;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;

class MarkdownTransformer
{
    private $markDownParser;
    private $cache;

    public function __construct(MarkdownParserInterface $markDownParser, Cache $cache)
    {
        $this->markDownParser = $markDownParser;
        $this->cache = $cache;
    }

    public function parse($str)
    {
        $cahe = $this->cache;
        $key = md5($str);
        if ($cahe->contains($key)) {
            $fact = $cahe->fetch($key);
        }
        sleep(1);
        $str =  $this->markDownParser->transformMarkdown($str);
        $cahe->save($key, $str);
        return $str;
    }
}
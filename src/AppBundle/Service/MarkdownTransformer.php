<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 28.03.17
 * Time: 22:19
 */

namespace AppBundle\Service;


use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;

class MarkdownTransformer
{
    private $markDownParser;
    public function __construct(MarkdownParserInterface $markDownParser) {
        $this->markDownParser = $markDownParser;
    }
    public function parse($str) {
        return $this->markDownParser->transformMarkdown($str);
    }
}
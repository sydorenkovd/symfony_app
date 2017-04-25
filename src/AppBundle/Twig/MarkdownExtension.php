<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 28.03.17
 * Time: 23:00
 */

namespace AppBundle\Twig;


use AppBundle\Service\MarkdownTransformer;

class MarkdownExtension extends \Twig_Extension
{
    private $markdownTransformer;

    public function __construct(MarkdownTransformer $markdownTransformer)
    {
        $this->markdownTransformer = $markdownTransformer;
    }

    public function getName()
    {
        return 'app_markdown';
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('markdownify', [$this, 'parseMarkdown'])
        ];
    }

    public function parseMarkdown($str)
    {
        return $this->markdownTransformer->parse($str);
    }
}
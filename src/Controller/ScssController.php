<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Leafo\ScssPhp\Compiler;
use Symfony\Component\Routing\Annotation\Route;

class ScssController extends AbstractController
{
    /**
     * @Route("scss/main", name="scss/main")
     */
    public function indexAction(Request $request)
    {
        // Create an instance of the Sass Compiler class
        $scss = new Compiler();

        $ds = DIRECTORY_SEPARATOR;
        $scssFile = $this->getParameter('kernel.project_dir') . $ds . 'public' . $ds . 'scss' . $ds . 'main.scss';

        $sassString = file_get_contents($scssFile);

        $sha1 = sha1_file($scssFile);

        $cacheDir = $this->getParameter('kernel.cache_dir') . $ds . 'css';

        if (!file_exists($cacheDir)) {
            mkdir($cacheDir);
        }

        $cssFile = $cacheDir . $ds . $sha1 . '.css';

        if (!file_exists($cssFile)) {
            $css = $scss->compile($sassString);
            file_put_contents($cssFile, $css);
        }

        $content = file_get_contents($cssFile);

        // Compile the sass string and store the CSS result in another variable


        // Return a response of CSS Type
        $response = new Response();
        $response->setContent($content);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/css');
        return $response;
    }
}
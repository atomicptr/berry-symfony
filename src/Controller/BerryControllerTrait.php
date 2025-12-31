<?php declare(strict_types=1);

namespace Berry\Symfony\Controller;

use Berry\Rendering\ArrayBufferRenderer;
use Berry\Element;
use Symfony\Component\HttpFoundation\Response;

trait BerryControllerTrait
{
    /**
     * Renders a view.
     *
     * @param array<string, string> $headers
     */
    protected function renderBerryView(Element $renderable, int $statusCode = 200, array $headers = []): Response
    {
        $renderer = new ArrayBufferRenderer();
        $renderable->render($renderer);

        return new Response($renderer->renderToString(), $statusCode, $headers);
    }
}

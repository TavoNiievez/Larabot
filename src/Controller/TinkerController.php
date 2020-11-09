<?php declare(strict_types=1);

namespace Larabot\Controller;

use App\Http\Controllers\AbstractController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory as View;

final class TinkerController extends AbstractController
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke(): Renderable
    {
        return $this->view->make('tinker');
    }
}

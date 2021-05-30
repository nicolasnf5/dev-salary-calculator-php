<?php
declare(strict_types=1);

namespace Presentation\Http\Actions;

use Application\Commands\Rate\DeleteRateCommand;
use Application\Handlers\Rate\DeleteRateHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class DeleteRateAction
{
    public function __construct(
        private DeleteRateHandler $deleteRateHandler,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $command = new DeleteRateCommand((int) $request->id);

        $this->deleteRateHandler->handle($command);

        return \Illuminate\Support\Facades\Response::json(
            'Rate deleted.',
            204
        );
    }
}

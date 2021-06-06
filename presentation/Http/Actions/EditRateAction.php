<?php
declare(strict_types=1);

namespace Presentation\Http\Actions;

use Application\Commands\Rate\EditRateCommand;
use Application\Handlers\Rate\EditRateHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class EditRateAction
{
    public function __construct(
        private EditRateHandler $editRateHandler,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $command = new EditRateCommand(
            (int) $request->id,
            $request->average_salary_in_cents,
            $request->gross_margin_in_cents,
        );

        $this->editRateHandler->handle($command);

        return \Illuminate\Support\Facades\Response::json(
            'Rate edited.',
            200
        );
    }
}

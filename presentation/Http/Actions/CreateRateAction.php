<?php
declare(strict_types=1);

namespace Presentation\Http\Actions;

use Application\Commands\Rate\CreateRateCommand;
use Application\Handlers\Rate\CreateRateHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class CreateRateAction
{
    public function __construct(
        private CreateRateHandler $createRateHandler,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $command = new CreateRateCommand(
            (int) $request->technology_id,
            $request->seniority,
            $request->language,
            $request->average_salary_in_cents,
            $request->gross_margin_in_cents,
            $request->currency,
        );

        $this->createRateHandler->handle($command);

        return \Illuminate\Support\Facades\Response::json(
            'Rate created.',
            201
        );
    }
}

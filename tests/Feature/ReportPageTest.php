<?php

namespace Tests\Feature;

use App\Http\Controllers\User\ReportController;
use Tests\TestCase;

class ReportPageTest extends TestCase
{
    public function test_report_page_action_does_not_require_a_report_id(): void
    {
        $view = app(ReportController::class)->show();

        $this->assertSame('report', $view->getName());
    }
}

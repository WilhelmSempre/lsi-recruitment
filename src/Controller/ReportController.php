<?php

namespace App\Controller;

use App\Entity\Report;
use App\Services\ReportService;
use App\Type\ReportType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ReportController
 *
 * @package App\Controller
 */
class ReportController extends AbstractController
{

    /**
     * @Route("/", name="index")
     *
     * @param Request $request
     * @param ReportService $reportService
     *
     * @return Response
     */
    public function indexAction(Request $request, ReportService $reportService): Response
    {
        $reports = $reportService->getAllReports();

        $locals = [];

        /** @var Report $report */
        foreach ($reports as $report) {
            $locals[$report->getLocal()] = $report->getLocal();
        }

        $filterForm = $this->createForm(ReportType::class, null, [
            'locals' => $locals,
        ]);

        if ($request->isMethod(Request::METHOD_POST)) {
            $filterForm->handleRequest($request);

            $reportFilter = $filterForm->getData();

            $reports = $reportService->filterReports($reportFilter);
        }

        $parameters = [
            'reports' => $reports,
            'filterForm' => $filterForm->createView(),
        ];

        return $this->render('Reports/index.html.twig', $parameters);
    }
}


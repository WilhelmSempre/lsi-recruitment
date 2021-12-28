<?php

namespace App\Controller;

use App\Entity\Report;
use App\Entity\ReportFilter;
use App\Services\ReportService;
use App\Type\ReportType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

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
     * @param TranslatorInterface $translator
     *
     * @return Response
     */
    public function indexAction(Request $request, ReportService $reportService, TranslatorInterface $translator): Response
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

            if (count($filterForm->getErrors(true)) <= 0) {

                /** @var ReportFilter $reportFilter */
                $reportFilter = $filterForm->getData();

                $dateTo = $reportFilter->getDateTo();
                $dateFrom = $reportFilter->getDateFrom();

                if ($dateTo->diff($dateFrom)->invert === 0) {
                    $filterForm->get('dateTo')->addError(new FormError($translator->trans('errors.period', [], 'errors')));
                } else {
                    $reports = $reportService->filterReports($reportFilter);
                }
            }
        }

        $parameters = [
            'reports' => $reports,
            'filterForm' => $filterForm->createView(),
        ];

        return $this->render('Reports/index.html.twig', $parameters);
    }
}


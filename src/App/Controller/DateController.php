<?php

namespace App\Controller;

use DateTime;
use DateTimeZone;
use Domain\Date\Decoder\DecodeManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints\DateTime as DateTimeConstraint;

class DateController extends AbstractController
{
    /**
     * @Route("/date", name="app_date_index")
     */
    public function index(): Response
    {
        return $this->render('date/index.html.twig');
    }

    /**
     * @Route("/date/decode", name="app_date_decode")
     */
    public function decode(
        Request $request,
        DecodeManager $decodeManager,
        ValidatorInterface $validator
    ): Response {
        $timezone = $request->get('timezone');
        try {
            $errors = $validator->validate($request->get('date'), new DateTimeConstraint('Y-m-d'));
            if (count($errors) > 0) {
                throw new Exception();
            }

            $date = new DateTime($request->get('date'), new DateTimeZone($timezone));
        } catch (Exception $e) {
            $this->addFlash('error', 'Invalid date ' . $request->get('date'));
            return $this->redirectToRoute('app_date_index');
        }

        $result = $decodeManager->decode($date);

        return $this->render('date/decode.html.twig', [
            'timezoneName' => $result['timezoneName'],
            'TimezoneOffset' => $result['timezoneOffset'],
            'februaryDays' => $result['februaryDays'],
            'specifiedMonthName' => $result['specifiedMonthName'],
            'specifiedDaysInMonth' => $result['specifiedDaysInMonth'],
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\TenderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use TelegramBot\Api\BotApi;
use App\Service\TelegramChannelService;
use Symfony\Component\HttpFoundation\JsonResponse;


class TenderController extends AbstractController
{
    private $tenderRepository;

    public  function __construct(TenderRepository $tenderRepository)
    {
        $tenderRepository = $this->tenderRepository;
    }

    #[Route('/tender', name: 'app_tender')]
    public function index(): Response
    {
        return $this->render('tender/index.html.twig', [
            'controller_name' => 'TenderController',
        ]);
    }

    /**
     * @Route("/send-message", name="send_message")
     * Posting to EthioBid Channel
     * 
     */
    public function sendMessage(TelegramChannelService $telegramChannelService)
    {
        // EthioBid Channel ChatId
        //$channelUsername = -1001650330452;
        // Kidus Channel ChatId
        $channelUsername = 479171039;
        $message = 'Hello from Symfony!';
        // Message needs to be defined. 
        $telegramChannelService->sendMessage($channelUsername, $message);

        return $this->redirectToRoute('app_tender');
    }

    /**
     * @Route("/send-photo", name="send_photo")
     * Posting to EthioBid Channel
     * 
     */
    public function sendPhoto(TelegramChannelService $telegramChannelService)
    {
        // EthioBid Channel ChatId
        //$channelUsername = -1001650330452;
        // Kidus Channel ChatId
        $channelUsername = 479171039;
        $message = 'Hello from Symfony!';
        $photo =  'https://ken-techno.com/wp-content/uploads/elementor/thumbs/cropped-logo-pwhirhs2tgtf1sj8auax4k3h17lar2rek5zjzlbl24.png';
        // Message needs to be defined. 
        $telegramChannelService->sendPhoto($channelUsername, $photo, $message);

        return $this->redirectToRoute('app_tender');
    }


    /**
     * API See all tender lists that are active
     *
     * @Route("/api-tenders", name="get_tenders", methods={"POST"})
     */
    public function gettenders(TenderRepository $tenderrepo): JsonResponse
    {
        //$tenderRepository = $this->tenderRepository;
        // $tenders = $this->tenderRepository->gettenders();
        $tenders = $tenderrepo->gettenders();
        //dd($tenders);
        foreach ($tenders as $tender) {
            $data[] = [
                'id' => $tender["id"],
                'name' => $tender["title"],
                'description' => $tender["description"],
                'category' => $tender["category_id"],
                'tendertype' => $tender["tendertype_id"],
                'image' => $tender["image"],
                'startprice' => $tender["startprice"],
                'currentprice' => $tender["currentprice"],
                // 'image' => $artist["image"],
                // 'favorite' => $artist["user_id"],
                // //'cover' => $artist->getCover(),
                // 'event' => $artistRepository->findEventByArtist($artist->getId()),
                // 'host' => $artistRepository->findHostByArtist($artist->getId())
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

}

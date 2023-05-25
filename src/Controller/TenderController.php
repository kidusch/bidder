<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use TelegramBot\Api\BotApi;
use App\Service\TelegramChannelService;

class TenderController extends AbstractController
{
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
}

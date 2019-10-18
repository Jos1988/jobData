<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\QueueItem;
use App\Repository\QueueItemRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/queue")
 */
class QueueController extends AbstractController
{
    /**
     * @var QueueItemRepository
     */
    private $queueRepo;

    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(EntityManager $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->queueRepo = $this->entityManager->getRepository(QueueItem::class);
        $this->logger = $logger;
    }

    /**
     * @Route("/get/{items}", name="queue")
     */
    public function getItemsForCrawling(int $items): JsonResponse
    {
        $items = $this->queueRepo->getOpenItems($items, QueueItem::SOURCE_MONSTER_COM);

        foreach ($items as $item) {
            $item->setStatus(QueueItem::STATUS_ASSIGNED);
        }

        try {
            $this->entityManager->persist($items);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            return $this->getErrorResponse($e);
        }

        return $this->json($items);
    }

    /**
     * @Route("/update/crawled/{id}", name="queue")
     */
    public function updateItemCrawled(int $id): JsonResponse
    {
        $item = $this->queueRepo->find($id);
        $item->setStatus(QueueItem::STATUS_CRAWLED);

        try {
            $this->entityManager->persist($item);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            return $this->getErrorResponse($e);
        }

        return $this->json(['success' => 'true']);
    }

    /**
     * @param $e
     *
     * @return JsonResponse
     */
    protected function getErrorResponse(Exception $e): JsonResponse
    {
        $this->logger->error($e->getMessage());

        return $this->json(['error' => $e->getMessage()]);
    }
}

<?php

namespace Eccube\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OtherDelivRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OtherDelivRepository extends EntityRepository
{
    /**
     * @param \Eccube\Entity\Customer $Customer
     * @param integer|null $id
     * @return \Eccube\Entity\OtherDeliv
     * @throws Exception
     */
    public function findOrCreateByCustomerAndId(\Eccube\Entity\Customer $Customer, $id = null)
{
        if (!$id) {
            $OtherDeliv = new \Eccube\Entity\OtherDeliv();
            $OtherDeliv->setCustomer($Customer);
        } else {
            $qb = $this->createQueryBuilder('od')
                ->andWhere('od.Customer = :Customer AND od.id = :id')
                ->setParameters(array(
                    'Customer' => $Customer,
                    'id' => $id,
                ));

            $OtherDeliv = $qb
                ->getQuery()
                ->getSingleResult();
        }

        return $OtherDeliv;
    }

    /**
     * @param \Eccube\Entity\Customer $Customer
     * @param integer $id
     * @return bool
     */
    public function deleteByCustomerAndId(\Eccube\Entity\Customer $Customer, $id)
    {
        $qb = $this->createQueryBuilder('od')
            ->andWhere('od.Customer = :Customer AND od.id = :id')
            ->setParameters(array(
                'Customer' => $Customer,
                'id' => $id,
            ));

        try {
            $OtherDeliv = $qb
                ->getQuery()
                ->getSingleResult();
        } catch (\Exception $e) {
            return false;
        }

        $em = $this->getEntityManager();
        $em->remove($OtherDeliv);
        $em->flush();

        return true;
    }
}

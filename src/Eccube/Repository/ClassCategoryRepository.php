<?php

namespace Eccube\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ClasscategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClassCategoryRepository extends EntityRepository
{
    public function getList($ClassName = null)
    {
        $qb = $this->createQueryBuilder('cc')
            ->orderBy('cc.rank', 'DESC');
        if ($ClassName) {
            $qb->where('cc.ClassName = :ClassName')->setParameter('ClassName', $ClassName);
        }
        $ClassCategories = $qb->getQuery()
            ->getResult();

        return $ClassCategories;
    }

    /**
     * @param  \Eccube\Entity\ClassCategory $ClassCategory
     * @return void
     */
    public function up(\Eccube\Entity\ClassCategory $ClassCategory)
    {
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            $rank = $ClassCategory->getRank();
            $ClassName = $ClassCategory->getClassName();

            // 
            $ClassCategory2 = $this->findOneBy(array('rank' => $rank + 1, 'ClassName' => $ClassName));
            if (!$ClassCategory2) {
                throw new \Exception();
            }
            $ClassCategory2->setRank($rank);
            $em->persist($ClassCategory);

            // ClassCategory更新
            $ClassCategory->setRank($rank + 1);

            $em->persist($ClassCategory);
            $em->flush();

            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            return false;
        }

        return true;
    }

    /**
     * @param  \Eccube\Entity\ClassCategory $ClassCategory
     * @return bool
     */
    public function down(\Eccube\Entity\ClassCategory $ClassCategory)
    {
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            $rank = $ClassCategory->getRank();
            $ClassName = $ClassCategory->getClassName();

            // 
            $ClassCategory2 = $this->findOneBy(array('rank' => $rank - 1, 'ClassName' => $ClassName));
            if (!$ClassCategory2) {
                throw new \Exception();
            }
            $ClassCategory2->setRank($rank);
            $em->persist($ClassCategory);

            // ClassCategory更新
            $ClassCategory->setRank($rank - 1);

            $em->persist($ClassCategory);
            $em->flush();

            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            return false;
        }

        return true;
    }

    /**
     * @param  \Eccube\Entity\ClassCategory $ClassCategory
     * @return bool
     */
    public function save(\Eccube\Entity\ClassCategory $ClassCategory)
    {
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            if (!$ClassCategory->getId()) {
                $ClassName = $ClassCategory->getClassName();
                $rank = $this->createQueryBuilder('cc')
                    ->select('MAX(cc.rank)')
                    ->where('cc.ClassName = :ClassName')->setParameter('ClassName', $ClassName)
                    ->getQuery()
                    ->getSingleScalarResult();
                if (!$rank) {
                    $rank = 0;
                }
                $ClassCategory->setRank($rank + 1);
                $ClassCategory->setDelFlg(0);
            }

            $em->persist($ClassCategory);
            $em->flush();

            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            return false;
        }

        return true;
    }

    /**
     * @param  \Eccube\Entity\ClassCategory $ClassCategory
     * @return bool
     */
    public function delete(\Eccube\Entity\ClassCategory $ClassCategory)
    {
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            $rank = $ClassCategory->getRank();
            $ClassName = $ClassCategory->getClassName();

            $em->createQueryBuilder()
                ->update('Eccube\Entity\ClassCategory', 'cc')
                ->set('cc.rank', 'cc.rank - 1')
                ->where('cc.rank > :rank AND cc.ClassName = :ClassName')
                ->setParameter('rank', $rank)
                ->setParameter('ClassName', $ClassName)
                ->getQuery()
                ->execute();

            $ClassCategory->setDelFlg(1);
            $em->persist($ClassCategory);
            $em->flush();

            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            return false;
        }

        return true;
    }
}

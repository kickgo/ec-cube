<?php

namespace Eccube\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductClass
 */
class ProductClass extends \Eccube\Entity\AbstractEntity
{
    private $price01_inc_tax = null;
    private $price02_inc_tax = null;
    private $point = null;

    /**
     * Is Enable
     *
     * @return bool 
     */
    public function isEnable()
    {
        return $this->getProduct()->isEnable();
    }

    /**
     * Set price01 IncTax
     *
     * @param string $price01
     * @return ProductClass
     */
    public function setPrice01IncTax($price01_inc_tax)
    {
        $this->price01_inc_tax = $price01_inc_tax;

        return $this;
    }

    /**
     * Get price01 IncTax
     *
     * @return string 
     */
    public function getPrice01IncTax()
    {
        return $this->price01_inc_tax;
    }

    /**
     * Set price02 IncTax
     *
     * @param string $price02
     * @return ProductClass
     */
    public function setPrice02IncTax($price02_inc_tax)
    {
        $this->price02_inc_tax = $price02_inc_tax;

        return $this;
    }

    /**
     * Get price02 IncTax
     *
     * @return string 
     */
    public function getPrice02IncTax()
    {
        return $this->price02_inc_tax;
    }

    /**
     * Set point
     *
     * @param string $point
     * @return ProductClass
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return string 
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Get StockFind
     *
     * @return bool 
     */
    public function getStockFind()
    {
        if ($this->getStock() > 0 || $this->getStockUnlimited() == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $stock;

    /**
     * @var integer
     */
    private $stock_unlimited;

    /**
     * @var string
     */
    private $sale_limit;

    /**
     * @var string
     */
    private $price01;

    /**
     * @var string
     */
    private $price02;

    /**
     * @var string
     */
    private $deliv_fee;

    /**
     * @var string
     */
    private $point_rate;

    /**
     * @var \DateTime
     */
    private $create_date;

    /**
     * @var \DateTime
     */
    private $update_date;

    /**
     * @var string
     */
    private $down_filename;

    /**
     * @var string
     */
    private $down_realfilename;

    /**
     * @var integer
     */
    private $del_flg;

    /**
     * @var \Eccube\Entity\Product
     */
    private $Product;

    /**
     * @var \Eccube\Entity\Master\ProductType
     */
    private $ProductType;

    /**
     * @var \Eccube\Entity\ClassCategory
     */
    private $ClassCategory1;

    /**
     * @var \Eccube\Entity\ClassCategory
     */
    private $ClassCategory2;

    /**
     * @var \Eccube\Entity\Member
     */
    private $Creator;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return ProductClass
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set stock
     *
     * @param string $stock
     * @return ProductClass
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return string 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set stock_unlimited
     *
     * @param integer $stockUnlimited
     * @return ProductClass
     */
    public function setStockUnlimited($stockUnlimited)
    {
        $this->stock_unlimited = $stockUnlimited;

        return $this;
    }

    /**
     * Get stock_unlimited
     *
     * @return integer 
     */
    public function getStockUnlimited()
    {
        return $this->stock_unlimited;
    }

    /**
     * Set sale_limit
     *
     * @param string $saleLimit
     * @return ProductClass
     */
    public function setSaleLimit($saleLimit)
    {
        $this->sale_limit = $saleLimit;

        return $this;
    }

    /**
     * Get sale_limit
     *
     * @return string 
     */
    public function getSaleLimit()
    {
        return $this->sale_limit;
    }

    /**
     * Set price01
     *
     * @param string $price01
     * @return ProductClass
     */
    public function setPrice01($price01)
    {
        $this->price01 = $price01;

        return $this;
    }

    /**
     * Get price01
     *
     * @return string 
     */
    public function getPrice01()
    {
        return $this->price01;
    }

    /**
     * Set price02
     *
     * @param string $price02
     * @return ProductClass
     */
    public function setPrice02($price02)
    {
        $this->price02 = $price02;

        return $this;
    }

    /**
     * Get price02
     *
     * @return string 
     */
    public function getPrice02()
    {
        return $this->price02;
    }

    /**
     * Set deliv_fee
     *
     * @param string $delivFee
     * @return ProductClass
     */
    public function setDelivFee($delivFee)
    {
        $this->deliv_fee = $delivFee;

        return $this;
    }

    /**
     * Get deliv_fee
     *
     * @return string 
     */
    public function getDelivFee()
    {
        return $this->deliv_fee;
    }

    /**
     * Set point_rate
     *
     * @param string $pointRate
     * @return ProductClass
     */
    public function setPointRate($pointRate)
    {
        $this->point_rate = $pointRate;

        return $this;
    }

    /**
     * Get point_rate
     *
     * @return string 
     */
    public function getPointRate()
    {
        return $this->point_rate;
    }

    /**
     * Set create_date
     *
     * @param \DateTime $createDate
     * @return ProductClass
     */
    public function setCreateDate($createDate)
    {
        $this->create_date = $createDate;

        return $this;
    }

    /**
     * Get create_date
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * Set update_date
     *
     * @param \DateTime $updateDate
     * @return ProductClass
     */
    public function setUpdateDate($updateDate)
    {
        $this->update_date = $updateDate;

        return $this;
    }

    /**
     * Get update_date
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Set down_filename
     *
     * @param string $downFilename
     * @return ProductClass
     */
    public function setDownFilename($downFilename)
    {
        $this->down_filename = $downFilename;

        return $this;
    }

    /**
     * Get down_filename
     *
     * @return string 
     */
    public function getDownFilename()
    {
        return $this->down_filename;
    }

    /**
     * Set down_realfilename
     *
     * @param string $downRealfilename
     * @return ProductClass
     */
    public function setDownRealfilename($downRealfilename)
    {
        $this->down_realfilename = $downRealfilename;

        return $this;
    }

    /**
     * Get down_realfilename
     *
     * @return string 
     */
    public function getDownRealfilename()
    {
        return $this->down_realfilename;
    }

    /**
     * Set del_flg
     *
     * @param integer $delFlg
     * @return ProductClass
     */
    public function setDelFlg($delFlg)
    {
        $this->del_flg = $delFlg;

        return $this;
    }

    /**
     * Get del_flg
     *
     * @return integer 
     */
    public function getDelFlg()
    {
        return $this->del_flg;
    }

    /**
     * Set Product
     *
     * @param \Eccube\Entity\Product $product
     * @return ProductClass
     */
    public function setProduct(\Eccube\Entity\Product $product)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get Product
     *
     * @return \Eccube\Entity\Product 
     */
    public function getProduct()
    {
        return $this->Product;
    }

    /**
     * Set ProductType
     *
     * @param \Eccube\Entity\Master\ProductType $productType
     * @return ProductClass
     */
    public function setProductType(\Eccube\Entity\Master\ProductType $productType)
    {
        $this->ProductType = $productType;

        return $this;
    }

    /**
     * Get ProductType
     *
     * @return \Eccube\Entity\Master\ProductType 
     */
    public function getProductType()
    {
        return $this->ProductType;
    }

    /**
     * Set ClassCategory1
     *
     * @param \Eccube\Entity\ClassCategory $classCategory1
     * @return ProductClass
     */
    public function setClassCategory1(\Eccube\Entity\ClassCategory $classCategory1 = null)
    {
        $this->ClassCategory1 = $classCategory1;

        return $this;
    }

    /**
     * Get ClassCategory1
     *
     * @return \Eccube\Entity\ClassCategory 
     */
    public function getClassCategory1()
    {
        return $this->ClassCategory1;
    }

    /**
     * Set ClassCategory2
     *
     * @param \Eccube\Entity\ClassCategory $classCategory2
     * @return ProductClass
     */
    public function setClassCategory2(\Eccube\Entity\ClassCategory $classCategory2 = null)
    {
        $this->ClassCategory2 = $classCategory2;

        return $this;
    }

    /**
     * Get ClassCategory2
     *
     * @return \Eccube\Entity\ClassCategory 
     */
    public function getClassCategory2()
    {
        return $this->ClassCategory2;
    }

    /**
     * Set Creator
     *
     * @param \Eccube\Entity\Member $creator
     * @return ProductClass
     */
    public function setCreator(\Eccube\Entity\Member $creator)
    {
        $this->Creator = $creator;

        return $this;
    }

    /**
     * Get Creator
     *
     * @return \Eccube\Entity\Member 
     */
    public function getCreator()
    {
        return $this->Creator;
    }
}

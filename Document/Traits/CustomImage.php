<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 12/11/15
 * Time: 02:22
 */

namespace SevenManagerBundle\Document\Traits;

use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;
use Symfony\Cmf\Bundle\MediaBundle\ImageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

trait CustomImage
{
    /**
     * @PHPCR\Child(cascade="persist")
     * @var Image
     */
    protected $image;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param null $image
     *
     * @return $this
     */
    public function setImage($image = null)
    {
        if (!$image) {
            return $this;
        }

        if (!$image instanceof ImageInterface && !$image instanceof UploadedFile) {
            $type = is_object($image) ? get_class($image) : gettype($image);

            throw new \InvalidArgumentException(sprintf(
                'Image is not a valid type, "%s" given.',
                $type
            ));
        }

        if ($this->image) {
            // existing image, only update content
            $this->image->copyContentFromFile($image);
        } elseif ($image instanceof ImageInterface) {
            $image->setName('image'); // ensure document has right name
            $this->image = $image;
        } else {
            $this->image = new Image();
            $this->image->copyContentFromFile($image);
        }

        return $this;
    }
}

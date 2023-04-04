<?php

namespace App\Services;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ImageUploaderHelper {

    private $slugger;
    private $translator;

    public function __construct(SluggerInterface $sluggeer, TranslatorInterface $translator) {
        $this->slugger = $slugger;
        $this->translator = $translator;
        }

    public function uploadImage($form, $formation) {
        $imageFile = $form->get('image')->getData();

        if ($imageFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
           
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
        
            try {
                $imageFile->move(
                    $this->getParameter('images_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
                $this->addFlash('danger', $translator->trans('An error has occured: ') . $e->getMessage());
                // ... handle exception if something happens during file upload
            }
        
            $formation->setimageFilename($newFilename);
        }
    }
}
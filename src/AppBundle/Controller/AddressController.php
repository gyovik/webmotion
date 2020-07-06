<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Address;
use AppBundle\Entity\ItemOrder;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Form\AddressType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddressController extends Controller
{
    /**
     * @Route("address/create", name="create_address")
     */
    public function createAddress(Request $request)
    {
        // Create the form
        $address = new Address();
        $form = $this->createForm(AddressType::class);

        $form->handleRequest($request);

        // Handle the form data after submit and if it is valid
        if($form->isSubmitted() && $form->isValid()){
            $address = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            $this->addFlash('notice', 'Új cím sikeresen mentve');

            return $this->redirectToRoute('create_address');
        }

       // Render the view
       return $this->render('address/create.html.twig', [
           'addresses' => $this->listAddresses(),
           'form'      => $form->createView(),
       ]);
    }

    /**
     * @Route("address/edit/{address}", name="edit_address")
     */
    public function editAddress(Request $request, Address $address)
    {
        // Create the form with the actual adress' data
        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);

        // If data form submitted and data is valid, proccess the form
        if($form->isSubmitted() && $form->isValid()){
    
            $em = $this->getDoctrine()->getManager();   
            $em->flush();

            // Nice message to user
            $this->addFlash('notice', 'A módosítások sikeresen mentve');

            return $this->redirectToRoute('create_address');
        }      

        return $this->render('address/edit.html.twig', [
            'addresses' => $this->listAddresses(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("address/delete/{id}", name="delete_address")
     */
    public function deleteAddress($id)
    {
        // Get the address we want to delete
        $em = $this->getDoctrine()->getManager();
        $address = $em->getRepository('AppBundle:Address')->find($id);

        // Delete it
        $em->remove($address);
        $em->flush();

        // Show success message for the user
        $this->addFlash('notice', 'A cím sikeresen törölve');

        // Redirect to the main address page
        return $this->redirectToRoute('create_address');
    }

     // List the available adresses to the bottom of the page
    private function listAddresses()
    {
        $addresses = $this->getDoctrine()
            ->getRepository('AppBundle:Address')
            ->findAll();

        return $addresses;
    }
}

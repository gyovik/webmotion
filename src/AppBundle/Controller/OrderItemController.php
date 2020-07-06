<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Address;
use AppBundle\Entity\ItemOrder;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use AppBundle\Form\OrderItemType;

class OrderItemController extends Controller
{
    /**
     * @Route("/", name="create_order")
     */
    public function indexAction(Request $request)
    {
        //  Add new address form       
        $form = $this->createForm(OrderItemType::class);
        $form->handleRequest($request);
       
        // Save the order with new address
        if($form->isValid()){
            // Save order to item_order table
            $em = $this->getDoctrine()->getManager();
            $order = $form->getData();
            $em->persist($order);
            $em->flush();

            // Save new address to address table
            $address = new Address();
            $address->setCustomerType($request->request->get('order_item')['customer_type']);
            $address->setName($request->request->get('order_item')['name']);
            $address->setPhoneNumber($request->request->get('order_item')['phone_number']);
            $address->setTaxNumber($request->request->get('order_item')['tax_number']);
            $address->setCountry($request->request->get('order_item')['country']);
            $address->setPostCode($request->request->get('order_item')['post_code']);
            $address->setCity($request->request->get('order_item')['city']);
            $address->setStreet($request->request->get('order_item')['street']);

            $em->persist($address);
            $em->flush();

            // Send success message
            $this->addFlash('notice', 'A megrendelés elmentve.');

            return $this->redirectToRoute('create_order');
        }

        // Get address list for the select part of the form
        $addressList = $this->getDoctrine()
        ->getRepository('AppBundle:Address')
        ->findAll();

        // Render just the form for AJAX (with validation error)
        if ($request->isXmlHttpRequest()) {  
            return $this->render('order/form.html.twig', [
                'form' => $form->createView()
            ]);
        }

        // Render the view
        return $this->render('order/create.html.twig', [
            'form'=> $form->createView(),
            'addressList' => $addressList,
        ]);
    }

    /**
     * @Route("/order/create/order", name="create_order_only")
     */
    public function createOrderOnly(Request $request)
    {
        // Get the selected address 
        $em = $this->getDoctrine()->getManager();
        $addressRep = $em->getRepository(Address::class);
        $address = $addressRep->find($request->request->get('address_id'));
        
        // Set order details 
        $order = new ItemOrder();
        $order->setTax($request->request->get('tax'));
        $order->setPriceWoTax($request->request->get('price_wo_tax'));
        $order->setFullPrice($request->request->get('full_price'));
        $order->setCustomerType($address->getCustomerType());
        $order->setName($address->getName());
        $order->setPhoneNumber($address->getPhoneNumber());
        $order->setTaxNumber($address->getTaxNumber());
        $order->setCountry($address->getCountry());
        $order->setPostCode($address->getPostCode());
        $order->setCity($address->getCity());
        $order->setStreet($address->getStreet());

        $em->persist($order);
        $em->flush();

        return new Response('Megrendelés elmentve.');
    }

    /**
     * @Route("/order/list", name="list_orders")
     */
    public function listOrders()
    {
        $orders = $this->getDoctrine()
        ->getRepository('AppBundle:ItemOrder')
        ->findAll();

        return $this->render('order/list.html.twig', [
            'orderItems' => $orders,
        ]);
    }
}

<?php

namespace ESPRITPIDEV\UserExpBundle\Controller;

use ESPRITPIDEV\UserExpBundle\Entity\ToDo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DateTime;
use Ob\HighchartsBundle\Highcharts\Highchart;

/**
 * Todo controller.
 *
 */
class ToDoController extends Controller
{
    /**
     * Lists all toDo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $toDos = $em->getRepository('ESPRITPIDEVUserExpBundle:ToDo')->findAll();

        return $this->render('todo/index.html.twig', array(
            'toDos' => $toDos,
        ));
    }

    /**
     * Creates a new toDo entity.
     *
     */
    public function newAction(Request $request)
    {
        $toDo = new Todo();
        $form = $this->createForm('ESPRITPIDEV\UserExpBundle\Form\ToDoType', $toDo);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $toDo->setDone(false);
            $em->persist($toDo);
            $em->flush($toDo);
        }
        $toDos = $em->getRepository('ESPRITPIDEVUserExpBundle:ToDo')->findBy(array(), array('datetime'=>'asc'), null,0);
        $emConfig= $this->getDoctrine()->getEntityManager()->getConfiguration();
        $emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
        $emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');

        $em = $this->getDoctrine()->getManager();



        $query = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v) as counted, 
            MONTH(v.datetime) as monthgb  FROM ESPRITPIDEVUserExpBundle:Complaints v 
             group by monthgb");
        $complaints=$query->getResult();
        $statArray= array();

        foreach($complaints as &$v) {
            array_push($statArray,intval($v['counted']));
        }


        // Chart
        $series = array(
            array("name" => "Evolution of the complaints",    "data" => $statArray)
        );

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');  // The #id of the div where to render the chart
        $ob->title->text('Number of complaints over a year');
        $categories = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

        $ob->xAxis->title(array('text'  => "Months"));
        $ob->xAxis->categories($categories);
        $ob->yAxis->title(array('text'  => "Number of complaints"));
        $ob->series($series);



        $ob2 = new Highchart();
        $ob2->chart->renderTo('piechart');
        $ob2->title->text('Users allowing animals');
        $ob2->plotOptions->pie(array(
            'allowPointSelect'  => true,
            'cursor'    => 'pointer',
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));



        $em = $this->getDoctrine()->getManager();
        $query = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v.iduser) as counted, v.animal as animalism
              FROM ESPRITPIDEVUserExpBundle:Preferences v group by v.animal
             ");
        $counted=$query->getResult();
        $statArray= array();
        foreach($counted as &$v) {
            $k='';
            if ($v['animalism']=='1')
                $k='Allows animals';
            else $k="Doesn't allow animals";
            array_push($statArray,array($k,intval($v['counted'])));
        }



        $ob2->series(array(array('type' => 'pie','name' => 'Browser share', 'data' => $statArray)));





        $ob3 = new Highchart();
        $ob3->chart->renderTo('piechart2');
        $ob3->chart->type('pie');

        $ob3->title->text('Music listeners');
        $ob3->plotOptions->series(
            array(
                'dataLabels' => array(
                    'enabled' => true,
                    'format' => '{point.name}: {point.y:.1f}'
                )
            )
        );

        $ob3->tooltip->headerFormat('<span style="font-size:11px">{series.name}</span><br>');
        $ob3->tooltip->pointFormat('<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>');
        $query = $this->getDoctrine()->getEntityManager()->createQuery("
select count(v.iduser) as counted,
 v.music as musicallow, 
 v.musictaste as taste 
 from ESPRITPIDEVUserExpBundle:Preferences v
 where v.music=0 
 group by v.musictaste 
             ");
        $query2 = $this->getDoctrine()->getEntityManager()->createQuery("
            SELECT count(v.iduser) as counted, v.music as musicallow
              FROM ESPRITPIDEVUserExpBundle:Preferences v group by  v.music        
        ");

        $counted=$query2->getResult();
        $data= array();
        foreach($counted as &$v) {
            $k='';
            if ($v['musicallow']=='1')
            {$k='Allows music';
                array_push($data,array('name'=>$k,'y'=>intval($v['counted']),'drilldown'=>'Allows music','visible'=>true));
            }
            else {$k="Doesn't allow music";
                array_push($data,array('name'=>$k,'y'=>intval($v['counted']),'drilldown'=>null,'visible'=>true));
            }

        }
        $musictastearray=array();
        $counted2=$query->getResult();
        foreach($counted2 as &$v) {
            array_push($musictastearray,array($v['taste'],intval($v['counted'])));
        }

        $ob3->series(
            array(
                array(
                    'name' => 'Music listeners',
                    'colorByPoint' => true,
                    'data' => $data
                )
            )
        );

        $drilldown = array(
            array(
                'name' => 'Allows music',
                'id' => 'Allows music',
                'data' => $musictastearray
            ),

        );
        $ob3->drilldown->series($drilldown);



        return $this->render('todo/new.html.twig', array(
            'form' => $form->createView(),
            'todos' => $toDos,
            'chart' => $ob, "chart2" => $ob2, "chart3"=>$ob3
        ));
    }

    /**
     * Finds and displays a toDo entity.
     *
     */
    public function showAction(ToDo $toDo)
    {
        $deleteForm = $this->createDeleteForm($toDo);

        return $this->render('todo/show.html.twig', array(
            'toDo' => $toDo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing toDo entity.
     *
     */
    public function editAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $toDoss = $em->getRepository('ESPRITPIDEVUserExpBundle:ToDo')->findOneBy(array('id'=>$id));

            $em = $this->getDoctrine()->getManager();
        if ($toDoss->isDone())
            $toDoss->setDone(false);
        else
            $toDoss->setDone(true);
            $em->persist($toDoss);
            $em->flush();

        $toDos = $em->getRepository('ESPRITPIDEVUserExpBundle:ToDo')->findBy(array(), array('datetime'=>'asc'), null,0);
        $toDodo = new Todo();
        $form = $this->createForm('ESPRITPIDEV\UserExpBundle\Form\ToDoType', $toDodo);


        return $this->redirectToRoute('no_new');

    }

    /**
     * Deletes a toDo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $query=$this->getDoctrine()->getEntityManager()->createQuery("delete from ESPRITPIDEVUserExpBundle:ToDo v 
          where v.id=:id")->setParameter('id', $id);
        $query->execute();

        return $this->redirectToRoute('no_new');
    }

    /**
     * Creates a form to delete a toDo entity.
     *
     * @param ToDo $toDo The toDo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ToDo $toDo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('no_delete', array('id' => $toDo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

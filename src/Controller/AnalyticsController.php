<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use Cake\View\JsonView;
use Cake\Datasource\ConnectionManager;

class AnalyticsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    public function index()
    {
        $this->loadModel("Products");
        $this->loadModel("Services");
        

        $products = $this->Products->find()->all();
        $services = $this->Services->find()->all();
        $this->set(compact('services'));
        $this->set(compact('products'));
    }

    public function analyticsData(){
        $this->loadModel("Products");
        $this->loadModel("Services");

        $db = ConnectionManager::get("default");

        $date = date("m-d-Y");
        $todaysAnalyticsQuery = "SELECT * FROM sales WHERE saleDate=? ORDER BY saleDate DESC LIMIT 6";
        $todaysAnalyticsData = $db->execute($todaysAnalyticsQuery,[$date])->fetchAll("assoc");


        $weeklyAnalyticsQuery = 'SELECT SUM(saleAmount) AS dailySaleAmount, saleDate FROM sales WHERE saleDate=?';
        $weeklyAnalyticsData = [];
        $todaysDate = strtotime(date('Y-m-d'));
        for ($i=0; $i < 7; $i++) { 
            $currentDate = date("m-d-Y",$todaysDate);
            $dailyData = $db->execute($weeklyAnalyticsQuery,[$currentDate])->fetchAll("assoc");
            $daily = [
                "dailySaleAmount"=>$dailyData[0]["dailySaleAmount"],
                "date"=>$currentDate
            ];
            array_push($weeklyAnalyticsData,$daily);
            $todaysDate -= (24*3600);
        }

        
        $monthlyAnalyticsQuery = "SELECT SUM(saleAmount) AS weeklySaleAmount FROM sales WHERE saleDate BETWEEN ? AND ?";
        $monthlyAnalyticsData = [];
        
        $today = strtotime(date("Y-m-d"));

        for ($i=1; $i <= 4 ; $i++) { 
            $startDay = date("m-d-Y",$today);
            $endDay = date("m-d-Y",strtotime(date("Y-m-d",$today))-(24*3600*7));

            $weeklyData = $db->execute($monthlyAnalyticsQuery,[$endDay,$startDay])->fetchAll("assoc");
            $d = [
                "weeklySaleAmount"=>$weeklyData[0]["weeklySaleAmount"],
                "date"=>"".$endDay." to ".$startDay.""
            ];

            array_push($monthlyAnalyticsData,$d);

            $today-=(24*3600*7);
        }

        
        $yearlyAnalyticsQuery = "SELECT SUM(saleAmount) AS monthlySaleAmount FROM sales WHERE saleDate BETWEEN ? AND ?";
        $yearlyAnalyticsData = [];
        $currentMonthDay = strtotime(date("Y-m-d"));
        for ($i=0; $i < 12; $i++) { 
            $startMonthDate = date("m-d-Y",$currentMonthDay);
            $endMonthDate = date("m-d-Y",strtotime(date("Y-m-d",$currentMonthDay))-(24*30*3600));
            $monthlyData = $db->execute($yearlyAnalyticsQuery,[$endMonthDate,$startMonthDate])->fetchAll("assoc");
            $dY = [
                "monthlySaleAmount"=>$monthlyData[0]["monthlySaleAmount"],
                "date"=>"".$endMonthDate." to ".$startMonthDate.""
            ];
            array_push($yearlyAnalyticsData,$dY);

            $currentMonthDay -= (24*30*3600);
        }

        
        
        $products = $this->Products->find()->all();
        $services = $this->Services->find()->all();
        $this->set(compact('services'));
        $this->set(compact('products'));
        $allAnalyticsData = [
            "daily"=>$todaysAnalyticsData,
            "weekly"=>$weeklyAnalyticsData,
            "monthly"=>$monthlyAnalyticsData,
            "yearly"=>$yearlyAnalyticsData
        ];
        $this->set(compact('allAnalyticsData'));
        $this->viewBuilder()->setOption('serialize', ['products']);
    }
}

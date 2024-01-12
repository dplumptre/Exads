<?php




require_once __DIR__ . '/DatabaseSingleton.php';



class TVSeriesScheduler {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getNextAirDate($dateTime = null, $titleFilter = null) {
        $dateTime = $dateTime ?? new DateTime();

        $sql = "SELECT tv_series.title, tv_series_intervals.week_day, tv_series_intervals.show_time
                FROM tv_series_intervals
                JOIN tv_series ON tv_series.id = tv_series_intervals.id_tv_series
                WHERE tv_series_intervals.show_time >= :current_date
                AND (tv_series.title LIKE :title_filter OR :title_filter IS NULL)
                ORDER BY tv_series_intervals.show_time ASC
                LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':current_date', $dateTime->format('Y-m-d H:i:s'));
        $stmt->bindValue(':title_filter', $titleFilter);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $nextAirDate = new DateTime($result['show_time']);
            return "The next episode of '{$result['title']}' will air on {$nextAirDate->format('l, Y-m-d H:i:s')}.";
        } else {
            return "No upcoming episodes found.";
        }
    }
}

// Get the database connection instance

$databaseSingleton = DatabaseSingleton::getInstance();
$pdo = $databaseSingleton->getConnection();


$currentDateTime = new DateTime();
$tvSeries = new TVSeriesScheduler($pdo);
$result = $tvSeries->getNextAirDate();
//$result = $tvSeries->getNextAirDate($currentDateTime, 'Breaking Bad');

echo $result;

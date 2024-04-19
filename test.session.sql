


-- @block




        $sql = "SELECT tv_series.title, tv_series_intervals.week_day, tv_series_intervals.show_time
                FROM tv_series_intervals
                JOIN tv_series ON tv_series.id = tv_series_intervals.id_tv_series
                WHERE tv_series_intervals.show_time >= :current_date
                AND (tv_series.title LIKE :title_filter OR :title_filter IS NULL)
                ORDER BY tv_series_intervals.show_time ASC
                LIMIT 1";

SELECT tv_series.title,tv_series.channel,tv_series.genre,tv_series_intervals.show_time,tv_series_intervals.week_day 
FROM tv_series 
JOIN tv_series_intervals 
ON tv_series.id = tv_series_intervals.id_tv_series 
WHERE tv_series_intervals.show_time >= now();
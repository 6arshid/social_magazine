-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2019 at 07:39 PM
-- Server version: 10.1.43-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wixcpzvy_today`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_persian_ci NOT NULL,
  `content_id` int(11) NOT NULL,
  `dtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `comment`, `content_id`, `dtime`) VALUES
(1, 2, 'test comment', 10, '2019-07-02 11:31:20'),
(2, 2, 'salam asaan', 10, '2019-07-21 09:39:29'),
(3, 2, 'hi', 10, '2019-08-05 01:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_persian_ci NOT NULL,
  `content` text COLLATE utf8mb4_persian_ci NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `lang` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `special` int(11) NOT NULL,
  `image` varchar(350) COLLATE utf8mb4_persian_ci NOT NULL,
  `hashtags` text COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL,
  `dtime` datetime NOT NULL,
  `memberID` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `love` int(11) NOT NULL,
  `ok` int(11) NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `comment` text COLLATE utf8mb4_persian_ci NOT NULL,
  `rss_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `content`, `source`, `lang`, `special`, `image`, `hashtags`, `description`, `dtime`, `memberID`, `like`, `dislike`, `love`, `ok`, `location`, `comment`, `rss_ID`) VALUES
(1, '&#x627;&#x641;&#x632;&#x627;&#x6CC;&#x634; 2 &#x628;&#x631;&#x627;&#x628;&#x631;&#x6CC; &#x642;&#x6CC;&#x645;&#x62A; &#x62F;&#x627;&#x631;&#x648;&#x647;&#x627;&#x6CC; &#x62E;&#x627;&#x635; &#x62F;&#x627;&#x62E;&#x644;&#x6CC;', '\r\n            <p id=\"news-body\">\r\n                به گزارش ایسنا،  <a class=\'news-tag\' tag=\'دکتر سعید نمکی\' href=\'/tags/%d8%af%da%a9%d8%aa%d8%b1-%d8%b3%d8%b9%db%8c%d8%af-%d9%86%d9%85%da%a9%db%8c\' target=\'_blank\'>دکتر سعید نمکی</a>  در ادامه نشست خبری امروزش با خبرنگاران، درباره افزایش قیمت دارو نیز گفت: ما با داروهایی طرف بودیم که چون تولید آن صرفه اقتصادی برای <a class=\'news-tag\' tag=\'تولید کننده\' href=\'/tags/%d8%aa%d9%88%d9%84%db%8c%d8%af-%da%a9%d9%86%d9%86%d8%af%d9%87\' target=\'_blank\'>تولید کننده</a>  نداشت با پنج برابر قیمت وارد کشور می شد. در این زمینه در مورد داروهای خاص قیمت ها تا دو برابر افزایش پیدا کرد که منجر به آن شد تا تولید کننده دلگرم شده و از واردات دارو بی نیاز شویم. با این افزایش قیمت باز هم قیمت دارو یک پنجم قیمت واردات ماند. البته در این زمینه باید با بیمه همفکری هایی شود.<br />   دستور وزیر بهداشت درباره افزایش ظرفیت تحصیلات تکمیلی   <br />وزیر بهداشت در ادامه صحبت هایش در خصوص افزایش ظرفیت رشته های پزشکی نیز گفت: سابق بر این، این گونه بود که برای رشته های تحصیلات تکمیلی دو سهمیه وجود داشت که نفر اول در <a class=\'news-tag\' tag=\'رتبه اول\' href=\'/tags/%d8%b1%d8%aa%d8%a8%d9%87-%d8%a7%d9%88%d9%84\' target=\'_blank\'>رتبه اول</a>  جذب شده و رتبه دوم از افراد سهمیه دار انتخاب می شد. این اتفاق دو اثر داشت؛ اول آن که باعث سرخوردگی جوانان دارای زیر رتبه 10 می شد و دوم آن که ذهنیت نابجا و غلطی در خصوص خانواده های شهدا ایجاد می شد که به هیچ عنوان ذهنیت روایی نبود.<br />وی افزود: به همین علت بنده دستور دادم معادل سهمیه ها ظرفیت تحصیلات تکمیلی بالا رود؛ یعنی نخبه فکر نکند کسی جایش را گرفته است؛ یعنی اگر قرار بود به عنوان مثال ۲۰ نفر را پذیرش کنیم، گفتیم آن تعداد از سهمیه ایثارگران و خانواده شهدا را کنار بگذارید و از بین داوطلبین آزاد زیر رتبه ۱۰ را جذب کنید.<br />ادامه دارد\r\n            </p>\r\n        ', 'http://tnews.ir/news/6e2b142370970.html', 'fa', 0, '895620179', 'افزایش,تحصیلات تکمیلی', 'وزیر بهداشت درباره افزایش قیمت برخی داروها توضیح داد.', '2019-10-12 12:32:07', 1, 0, 0, 0, 0, '', '', 2),
(2, '&#x67E;&#x6CC;&#x634; &#x628;&#x6CC;&#x646;&#x6CC; &#x627;&#x633;&#x6A9;&#x627;&#x646; &#x627;&#x636;&#x637;&#x631;&#x627;&#x631;&#x6CC; &#x6F5;&#x6F2; &#x647;&#x632;&#x627;&#x631; &#x646;&#x641;&#x631; &#x62F;&#x631; &#x686;&#x647;&#x627;&#x631; &#x645;&#x631;&#x632; &#x62E;&#x631;&#x648;&#x62C;&#x6CC;', '\r\n            <p id=\"news-body\">\r\n                به گزارش  خبرگزاری مهر ، <a class=\'news-tag\' tag=\'مرتضی سلیمی\' href=\'/tags/%d9%85%d8%b1%d8%aa%d8%b6%db%8c-%d8%b3%d9%84%db%8c%d9%85%db%8c\' target=\'_blank\'>مرتضی سلیمی</a>  با اشاره به افزایش تراکم جمعیتی در چهارمرز خسروی، شلمچه، چزابه و مهران برای ورود به کشور عراق برای مراسم اربعین حسینی، گفت: برای اسکان اضطراری ۵۲ هزار نفر در این چهار مرز تدابیر لازم اندیشیده شده است.<br />وی ادامه داد: پیش بینی اسکان ۱۷ هزار نفر در شهرهای قصرشیرین، <a class=\'news-tag\' tag=\'دالاهو\' href=\'/tags/%d8%af%d8%a7%d9%84%d8%a7%d9%87%d9%88\' target=\'_blank\'>دالاهو</a>،  <a class=\'news-tag\' tag=\'سرپل ذهاب\' href=\'/tags/%d8%b3%d8%b1%d9%be%d9%84-%d8%b0%d9%87%d8%a7%d8%a8\' target=\'_blank\'>سرپل ذهاب</a>،  گیلان غرب، <a class=\'news-tag\' tag=\'کنگاور\' href=\'/tags/%da%a9%d9%86%da%af%d8%a7%d9%88%d8%b1\' target=\'_blank\'>کنگاور</a>  و صحنه که مرز خروجی هموطنان خسروی است، انجام شده است.<br />رئیس سازمان امداد و نجات جمعیت هلال احمر با بیان اینکه در <a class=\'news-tag\' tag=\'استان خوزستان\' href=\'/tags/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d8%ae%d9%88%d8%b2%d8%b3%d8%aa%d8%a7%d9%86\' target=\'_blank\'>استان خوزستان</a>  تدابیر لازم برای اسکان اضطراری ۲۶ هزار نفر از هموطنان در مرزهای شلمچه و چزابه اندیشیده شده است، تاکید کرد: امکان اسکان اضطراری ۱۶ هزار نفر در خرمشهر و اردوگاه شهید باکری و ۱۰ هزار نفر در <a class=\'news-tag\' tag=\'دشت ازادگان\' href=\'/tags/%d8%af%d8%b4%d8%aa-%d8%a7%d8%b2%d8%a7%d8%af%da%af%d8%a7%d9%86\' target=\'_blank\'>دشت ازادگان</a>،  <a class=\'news-tag\' tag=\'سوسنگرد\' href=\'/tags/%d8%b3%d9%88%d8%b3%d9%86%da%af%d8%b1%d8%af\' target=\'_blank\'>سوسنگرد</a>  و <a class=\'news-tag\' tag=\'حمیدیه\' href=\'/tags/%d8%ad%d9%85%db%8c%d8%af%db%8c%d9%87\' target=\'_blank\'>حمیدیه</a>  فراهم شده است.<br />به گفته سلیمی برای هموطنانی که <a class=\'news-tag\' tag=\'مرز مهران\' href=\'/tags/%d9%85%d8%b1%d8%b2-%d9%85%d9%87%d8%b1%d8%a7%d9%86\' target=\'_blank\'>مرز مهران</a>  را برای مراسم پیاده روی اربعین انتخاب کرده اند نیز اسکان اضطراری برای ۱۰هزار نفر در مدارس، سالن های ورزشی، مساجد و حسینیه ها فراهم شده است.\r\n            </p>\r\n        ', 'http://tnews.ir/news/d50a142363954.html', 'fa', 0, '490343442', 'اسکان,اضطراری', '', '2019-10-12 12:32:13', 1, 0, 0, 0, 0, '', '', 2),
(3, '&#x632;&#x627;&#x626;&#x631;&#x627;&#x646; &#x627;&#x645;&#x631;&#x648;&#x632; &#x628;&#x647; &#x645;&#x631;&#x632; &#x62E;&#x633;&#x631;&#x648;&#x6CC; &#x645;&#x631;&#x627;&#x62C;&#x639;&#x647; &#x646;&#x6A9;&#x646;&#x646;&#x62F;', '\r\n            <p id=\"news-body\">\r\n                سرهنگ «محمدرضا آمویی» در گفت و گو با خبرنگار ایرنا اظهارداشت: با توجه به جمعیت انبوهی که هم اکنون در مرز خسروی برای عبور وجود دارد، سایر زوار تحت هیچ شرایطی به این مرز مراجعه نکنند.<br /> وی ادامه داد: با توجه به محدودیت ساعت اعزام زوار به <a class=\'news-tag\' tag=\'خاک عراق\' href=\'/tags/%d8%ae%d8%a7%da%a9-%d8%b9%d8%b1%d8%a7%d9%82\' target=\'_blank\'>خاک عراق</a>  که از هفت صبح تا حدود ساعت ۱۶ عصر است، ظرفیت خسروی از هم اکنون تکمیل شده است.<br /> سرهنگ آمویی با بیان اینکه هم اکنون کار اعزام زائرانی که طی یکی ۲ روز گذشته در مرز خسروی و شهر قصرشیرین اسکان داده شده بودند در حال انجام است، گفت: تلاش می شود این افراد تا ساعت ۱۶ عصر امروز از مرز عبور داده شوند.<br /> معاون اجتماعی پلیس کرمانشاه گفت: در چنین شرایطی به زائران گرامی توصیه می کنیم با مدیریت زمان سفر خود، امروز از حضور در مرز خسروی خودداری کنند.<br /> وی در پایان یادآوری کرد: به محض فراهم شدن شرایط برای حضور مجدد زائران در مرز خسروی اطلاع رسانی لازم صورت می گیرد.<br /> روز گذشته (جمعه - ۱۹ مهر) نیز از زائران خواسته شده بود تا از حضور در مرز خسروی خودداری کنند.<br />امسال چهار مرز خسروی، <a class=\'news-tag\' tag=\'مهران\' href=\'/tags/%d9%85%d9%87%d8%b1%d8%a7%d9%86\' target=\'_blank\'>مهران</a>،  چذابه و شلمچه برای تردد زائران اربعین حسینی باز است.<br />عزیمت زائران اربعین حسینی از مرز رسمی خسروی روز پنجشنبه ۱۱ مهرماه به درخواست مسئولان عراقی متوقف و از دوشنبه پانزدهم مهرماه از سرگرفته شد.<br />مرز خسروی به عنوان نزدیکترین مسیر عبور زوار عتبات  عالیات به عراق پس از سال ها انتظار ۱۵ شهریور امسال با حضور وزرای کشور ایران و عراق بازگشایی شد، به همین علت مسئولان استان تمام تلاش خود را برای میزبانی هرچه بهتر از زوار به کار گرفته اند.<br />مرز خسروی نزدیکترین نقطه از کشورمان به بغداد پایتخت عراق ۱۹۰، نجف ۳۸۰، کربلا ۲۲۴، کاظمین ۲۰۳ و ...\r\n            </p>\r\n        ', 'http://tnews.ir/news/5700142352303.html', 'fa', 0, '1976279821', 'خسروی,زائران', 'کرمانشاه- ایرنا- معاون اجتماعی فرماندهی انتظامی استان کرمانشاه، از زائران اربعین حسینی (ع) خواست امروز (شنبه ۲۰ مهر) از مراجعه به مرز خسروی خودداری کنند.', '2019-10-12 12:32:18', 1, 0, 0, 0, 0, '', '', 2),
(4, '&#x632;&#x627;&#x626;&#x631;&#x627;&#x646; &#x627;&#x645;&#x631;&#x648;&#x632; &#x647;&#x645; &#x628;&#x647; &#x62E;&#x633;&#x631;&#x648;&#x6CC; &#x646;&#x631;&#x648;&#x646;&#x62F;', '\r\n            <p id=\"news-body\">\r\n                به گزارش  خبرگزاری صدا و سیما  مرکز کرمانشاه، سرهنگ \"محمدرضا آمویی\"معاون اجتماعی فرماندهی انتظامی استان اظهار داشت: با  توجه به جمعیت انبوهی که هم اکنون در مرز خسروی برای عبور وجود دارد، سایر زوار تحت هیچ شرایطی به این مرز مراجعه نکنند.<br />وی ادامه داد: با توجه به محدودیت ساعت اعزام زوار به <a class=\'news-tag\' tag=\'خاک عراق\' href=\'/tags/%d8%ae%d8%a7%da%a9-%d8%b9%d8%b1%d8%a7%d9%82\' target=\'_blank\'>خاک عراق</a>  که از ۷ صبح تا حدود ۱۶ عصر است، ظرفیت خسروی از هم تکنون تکمیل شده است.<br />سرهنگ آمویی با بیان اینکه هم اکنون کار اعزام زائرانی که طی یکی دو روز گذشته در مرز خسروی و شهر قصرشیرین اسکان داده شده بودند در حال انجام است، گفت: تلاش می شود این افراد تا ساعت ۱۶ عصر امروز از مرز عبور داده شوند.<br />معاون اجتماعی پلیس کرمانشاه گفت: در چنین شرایطی به زائران گرامی توصیه می کنیم با مدیریت زمان سفر خود، امروز را از حضور در مرز خسروی خودداری کنند.<br />وی در پایان یادآوری کرد: به محض فراهم شدن شرایط برای حضور مجدد زائران در مرز خسروی اطلاع رسانی لازم صورت می گیرد.<br />روز گذشته (جمعه - ۱۹ مهر) نیز از زائران خواسته شده بود تا از حضور در مرز خسروی خودداری کنند.\r\n            </p>\r\n        ', 'http://tnews.ir/news/7585142352368.html', 'fa', 0, '488992432', 'خسروی', 'معاون اجتماعی فرماندهی انتظامی استان از زائران خواست تا امروز (شنبه - ۲۰ مهر) را نیز از مراجعه به مرز خسروی خودداری نکنند.', '2019-10-12 12:32:22', 1, 0, 0, 0, 0, '', '', 2),
(5, '&#x628;&#x627;&#x632;&#x6AF;&#x634;&#x62A; &#x6F1;&#x6F8;&#x6F4; &#x632;&#x627;&#x626;&#x631; &#x645;&#x635;&#x62F;&#x648;&#x645; &#x648; &#x628;&#x6CC;&#x645;&#x627;&#x631; &#x627;&#x631;&#x628;&#x639;&#x6CC;&#x646; &#x628;&#x647; &#x6A9;&#x634;&#x648;&#x631;', '\r\n            <p id=\"news-body\">\r\n                پیرحسین کولیوند در گفت وگو با  ایسنا  درباره آخرین وضعیت پذیرش <a class=\'news-tag\' tag=\'زائران ایرانی\' href=\'/tags/%d8%b2%d8%a7%d8%a6%d8%b1%d8%a7%d9%86-%d8%a7%db%8c%d8%b1%d8%a7%d9%86%db%8c\' target=\'_blank\'>زائران ایرانی</a>  مصدوم یا بیمار که به کشور بازگردانده شده اند گفت: برابر آخرین آمارها تا ساعت هشت صبح امروز در مجموع ۱۸۴ زائر ایرانی در کشور عراق به ایران بازگردانده شده اند.<br />وی با بیان اینکه بیشتر این افراد از مرزهای شلمچه و مهران به کشور بازگشته اند، گفت: ۹۲ نفر از مرز مهران و ۸۹ نفر از <a class=\'news-tag\' tag=\'مرز شلمچه\' href=\'/tags/%d9%85%d8%b1%d8%b2-%d8%b4%d9%84%d9%85%da%86%d9%87\' target=\'_blank\'>مرز شلمچه</a>  وارد کشور شده اند. دو نفر نیز از مرز چذابه و یک نفر نیز از <a class=\'news-tag\' tag=\'مرز خسروی\' href=\'/tags/%d9%85%d8%b1%d8%b2-%d8%ae%d8%b3%d8%b1%d9%88%db%8c\' target=\'_blank\'>مرز خسروی</a>  وارد کشور شده اند.<br />کولیوند در مورد وضعیت مصدومان انتقالی نیز گفت: از کل ۹۲ مصدوم و بیمار پذیرش شده در مرز مهران، ۶۶ نفر درمراکز درمانی بستری شده و ۲۰ نفر نیز به مراکز درمانی شهر مبدا اعزام شده اند. شش نفر نیز درمان و ترخیص شده اند.<br />رییس اورژانس کشور اضافه کرد: از میان ۸۹ مصدوم و بیمار پذیرش شده در مرز شلمچه نیز ۵۱ نفر بستری شده، سه نفر به مراکز درمانی شهر مبدا منتقل شده و ۳۵ نفر نیز پس از درمان ترخیص شده اند.<br />وی در مورد بیماران پذیرش شده در مرز چذابه و خسروی نیز گفت: در مرز چذابه دو نفر پذیرش شدند که یک نفر بستری شده و دیگری ترخیص شده است. مورد پذیرش شده در مرز خسروی نیز یک نفر بوده که همچنان بستری است.\r\n            </p>\r\n        ', 'http://tnews.ir/news/303c142375290.html', 'fa', 0, '2080281087', 'پذیرش', 'رییس اورژانس کشور از اعزام ۱۸۴ نفر از زائران ایرانی بیمار یا مصدوم شده در کشور عراق به ایران خبر داد.', '2019-10-12 12:32:25', 1, 0, 0, 0, 0, '', '', 2),
(6, '&#x622;&#x62E;&#x631;&#x6CC;&#x646; &#x622;&#x645;&#x627;&#x631; &#x633;&#x627;&#x645;&#x627;&#x646;&#x647; &#x633;&#x645;&#x627;&#x62D;/ &#x631;&#x6A9;&#x648;&#x631;&#x62F; &#x62B;&#x628;&#x62A; &#x646;&#x627;&#x645; &#x634;&#x6A9;&#x633;&#x62A;&#x647; &#x634;&#x62F;', '\r\n            <p id=\"news-body\">\r\n                حجت الاسلام صحبت الله رحمانی در مورد تعداد ثبت نام کنندگان در سامانه سماح گفت: از ابتدای ثبت نام تا کنون ۳ میلیون و ۱۵۰ هزار نفر از مشتاقان امام حسین (ع) برای پیاده روی اربعین در سامانه سماح ثبت نام کرده اند.<br />وی افزود: ثبت نامها تا <a class=\'news-tag\' tag=\'روز اربعین\' href=\'/tags/%d8%b1%d9%88%d8%b2-%d8%a7%d8%b1%d8%a8%d8%b9%db%8c%d9%86\' target=\'_blank\'>روز اربعین</a>  ادامه دارد اما با توجه به اینکه تعداد زیادی از مردم برای شرکت در <a class=\'news-tag\' tag=\'مراسم اربعین\' href=\'/tags/%d9%85%d8%b1%d8%a7%d8%b3%d9%85-%d8%a7%d8%b1%d8%a8%d8%b9%db%8c%d9%86\' target=\'_blank\'>مراسم اربعین</a>  اعزام شده اند به همین دلیل پیش بینی ما این است که تا دو سه روز قبل از اربعین روند ثبت نام ها بسیار کاهش پیدا کند.<br /> رییس کمیته اعزام و ثبت نام اربعین تاکید کرد: پیش بینی امسال ما ثبت نام ۳ میلیون نفر از زائران در سامانه سماح بود که تا امروز این رکورد شکسته شده است .<br />حجت الاسلام رحمانی در پاسخ به این سوال که آیا زائرینی که در تصافات چند روز گذشته فوت و یا زخمی شده است بیمه بوده اند یا خیر گفت: بله تمامی این افراد درسامانه سماح ثبت نام کرده بودند به همین دلیل بیمه به آنها تعلق می گیرد.<br />وی با اشاره به اینکه نماینده ای از بیمه در بیمارستانها حضور دارد تاکید کرد: زائرانی که مجروح شده اند در بیمارستان هزینه آنها از سوی بیمه پرداخت می شود و نماینده بیمه تمامی کارهای آنها را انجام می دهد و دیگر نیازی به پرداخت هزینه نیست.<br />مدیرکل عتبات سازمان حج اظهار داشت: از آغاز پیاده روی اربعین تا کنون حدود ۳۰ نفر از زائران به دلایل مختلف مانند تصادف و یا به صورت طبیعی ، جان خود را از دست داده اند که بیمه دیه آنها را پرداخت می کند.<br /> ۴۷۴۷\r\n            </p>\r\n        ', 'http://tnews.ir/news/bc96142374701.html', 'fa', 0, '1988282681', 'اربعین,سامانه سماح', 'مهر نوشت: مدیرکل عتبات سازمان حج با اشاره به اینکه ۳ میلیون و ۱۵۰ هزار نفردر سامانه سماح ثبت نام کرده اند گفت: تمامی زائرین اربعین که فوت و یا زخمی شده اند، بیمه بوده و هزینه های آنها پرداخت شده است.', '2019-10-12 12:32:28', 1, 0, 0, 0, 0, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `Xadmin` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `resetToken` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `resetComplete` varchar(3) COLLATE utf8mb4_bin DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `username`, `Xadmin`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'mrlast', 1, '$2y$10$B7EH7IEafPVM1xqHr/r.vOwWQaUqQyYlMCr7jQe7eHzhG5tQMAphq', '01.mrlast@gmail.com', 'Yes', NULL, 'No'),
(3, 'mrlast2', 0, '$2y$10$B7EH7IEafPVM1xqHr/r.vOwWQaUqQyYlMCr7jQe7eHzhG5tQMAphq', 'd', 'Yes', NULL, 'No'),
(4, 'last', 0, '$2y$10$2q/rvg3HMMUSU8E7WchF5u/dWPqJPx8kvEQAFBOQ39/bvfG9p.6w2', 'fa.addlist@gmail.com', 'aeb7ff976bc37c6c4ede5f6ce5b93e93', NULL, 'No'),
(5, 'iiii', 0, '$2y$10$dzTg3KwEfGu6xEpTBg308.IeUfkXiUcpESTSuxQYmEvD4VLRl.7lK', 'iiii@iiii.iiii', 'e5b379167b96de5c4733ff19e80c182f', NULL, 'No'),
(6, 'alibaba', 0, '$2y$10$0/PqEfjnnpS.BbLddc9Cr.2BVhYIzVIe61SgvVe6LXT.Lux0qyLM6', 'alibaba@alibaba.com', 'b0e22bf019784784845c27ec05faeb79', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `rss_reader`
--

CREATE TABLE `rss_reader` (
  `rss_ID` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `title_user` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `source` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `starter` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `start_html_title` varchar(400) COLLATE utf8mb4_persian_ci NOT NULL,
  `end_html_title` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `start_html` text COLLATE utf8mb4_persian_ci NOT NULL,
  `end_html` text COLLATE utf8mb4_persian_ci NOT NULL,
  `start_html_url` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_persian_ci NOT NULL,
  `memberID` int(11) NOT NULL,
  `sys` varchar(200) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `rss_reader`
--

INSERT INTO `rss_reader` (`rss_ID`, `title`, `title_user`, `source`, `starter`, `start_html_title`, `end_html_title`, `start_html`, `end_html`, `start_html_url`, `lang`, `memberID`, `sys`) VALUES
(1, 'خبر فارسی', 'خبر فارسی', 'https://khabarfarsi.com/politics', 'https://khabarfarsi.com', 'h1 class=\"clear\"', 'h1', 'p id=\"news-teaser\"', 'p', '[class=\"ntitle\"]a', 'fa', 1, 'Html'),
(2, 'تی نیوز', 'تی نیوز', 'http://tnews.ir/groups/%d8%a7%d8%ac%d8%aa%d9%85%d8%a7%d8%b9%db%8c', 'http://tnews.ir', 'h1', 'h1', 'div class=\"news-body-container np-sec\"', 'div', 'a[class=\"news-link\"]', 'fa', 1, 'Html'),
(3, 'tabnak', 'tabnak', 'https://www.tabnak.ir/fa/rss/allnews', 'https://www.tabnak.ir', 'h1 class=\"Htag\"', 'h1', 'div class=\"body\"', 'div', 'a[class=\"title5\"]', 'fa', 1, 'Rss'),
(4, 'radiofarda', 'radiofarda', 'https://www.radiofarda.com/iran', 'https://www.radiofarda.com', 'h1 class=\"pg-title\"', 'h1', 'div class=\"col-xs-12 col-sm-12 col-md-8 col-lg-8 pull-left bottom-offset content-offset\"', 'div', 'div[class=\"content\"]', 'fa', 1, 'Html'),
(5, 'bbc', 'bbc', 'https://www.bbc.com/persian/iran', 'https://www.bbc.com', 'h1 class=\"story-body__h1\"', 'h1', 'div class=\"story-body__inner\" property=\"articleBody\"', 'div', 'a[class=\"title-link\"]', 'fa', 1, 'Html'),
(6, 'بهترین های خبر فارسی', '', 'https://khabarfarsi.com/rss/top', '', '', '', '', '', '', '', 1, 'Rss'),
(7, 'alef', '', 'https://www.alef.ir/rss/popular/all.xml', '', '', '', '', '', '', '', 1, 'Rss'),
(8, 'zeytoon', '', 'https://zeitoons.com/feed', '', '', '', '', '', '', '', 1, 'Rss'),
(9, 'billmaher', '', 'http://billmaher.hbo.libsynpro.com/rss', '', '', '', '', '', '', 'en', 1, 'Rss'),
(10, 'bbc en 2', 'bbc en ', 'https://www.bbc.com/news', 'https://www.bbc.com', 'h1 class=\"story-body__h1\"', 'h1', 'div class=\"story-body__inner\" property=\"articleBody\"', 'div', 'a[class=\"gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor\"]', 'en', 1, 'Html'),
(11, 'twitter', '', 'https://twitrss.me/twitter_user_to_rss/?user=YaarDabestaani\r\n', '', '', '', '', '', '', '', 1, 'Rss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `rss_reader`
--
ALTER TABLE `rss_reader`
  ADD PRIMARY KEY (`rss_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rss_reader`
--
ALTER TABLE `rss_reader`
  MODIFY `rss_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

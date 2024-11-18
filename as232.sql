-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `as232`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Trái cây'),
(2, 'Thịt'),
(3, 'Rau củ quả'),
(4, 'Thủy hải sản');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`product_id`, `customer_id`, `content`, `created_at`) VALUES
(1, 2, 'Dưa ngon và ngọt nước như quảng cáo!', '2022-07-01 08:14:06'),
(1, 3, 'Dưa đẹp. Mình bổ ra ăn thấy ngon lắm!', '2022-07-03 02:07:09'),
(2, 4, 'E-L-E-G-A-N-T', '2022-10-12 01:18:08'),
(3, 4, 'Nho ngon và ngọt. Cho hỏi admin nhập hàng ở đâu vậy?', '2024-01-12 01:18:08'),
(4, 3, 'Ăn rất vừa miệng, sản phẩm tươi ngon', '2024-05-04 14:29:51'),
(4, 5, 'Kiwi đẹp mà giá còn phải chăng nữa', '2022-10-15 01:13:20'),
(5, 6, 'Thịt tươi ngon', '2022-11-12 03:18:08'),
(9, 2, 'NGƯỜI VIỆT NAM ƯU TIÊN DÙNG HÀNG VIỆT NAM', '2023-01-12 02:17:15'),
(14, 5, 'Cua thơm, nhiều thịt', '2023-10-12 01:18:08'),
(16, 6, 'Tôm ngon, khá chắc thịt', '2023-12-13 11:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `header` text NOT NULL,
  `intro` text DEFAULT NULL,
  `content` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `img_url`, `header`, `intro`, `content`, `author`, `created_at`) VALUES
(1, 'https://image.thanhnien.vn/w2048/Uploaded/2022/ayhuaht/2022_10_18/tao-tq-1886-964.jpg', 'Nông sản, thực phẩm trôi nổi vẫn còn nhiều', 'Từ rạng sáng, Bộ trưởng đi kiểm tra tại chợ đầu mối Bình Điền và các kênh phân phối hiện đại; sau đó làm việc với Công ty cổ phần VN kỹ nghệ súc sản (Vissan), thăm các trang trại sản xuất rau, dưa lưới ở Hóc Môn và Củ Chi.', 'Qua kiểm tra thực tế, Bộ trưởng Lê Minh Hoan thừa nhận tình trạng buôn bán hàng trôi nổi vẫn còn nhiều. “Sáng nay, chúng ta đi kiểm tra thực tế chợ Bình Điền chứng kiến bên trong chợ họ làm khá tốt nhưng phía ngoài tình trạng buôn bán hàng trôi nổi rất nhiều. Việc này sẽ làm những người phía bên trong mất lòng tin và họ chạy ra ngoài, dẫn đến mất kiểm soát. Chính vì vậy cần có sự vào cuộc của các cấp chính quyền địa phương”, Bộ trưởng cho biết và nhận xét: Trước đây chúng ta không biết ai làm gì, ở đâu, số lượng bao nhiêu, giá cả như thế nào… đến ngay cả chính sách hỗ trợ cũng gặp khó khăn. Chính vì vậy mà khâu kiểm soát chất lượng sản phẩm cũng gặp rất nhiều khó khăn, thiếu minh bạch. Giờ muốn kiểm soát chất lượng cần phải thiết lập lại hệ thống tổ chức, giải bài toán nông nghiệp nhỏ lẻ bằng sự liên kết giữa nông dân và doanh nghiệp, có đăng ký và quản lý giám sát lẫn nhau. Nếu chỉ có riêng bộ máy quản lý nhà nước thì không thể làm hết được.\r\n\r\nChuyến khảo sát của Bộ NN-PTNT nhằm chuẩn bị cho hội nghị “Đảm bảo chất lượng, an toàn thực phẩm và minh bạch nguồn gốc xuất xứ thực phẩm cho người tiêu dùng VN”, được tổ chức sáng nay 18.10.', 'ADMIN', '2024-05-08 07:34:58'),
(2, 'https://image.thanhnien.vn/w2048/Uploaded/2022/wohuohb/2022_11_10/toyen-5072.jpeg', 'Trung Quốc chính thức nhập khẩu khoai lang, tổ yến của Việt Nam', 'Ngày 10.11, Bộ NN-PTNT cho biết đã tiếp nhận thông tin từ công điện hỏa tốc của Đại sứ quán Việt Nam tại Trung Quốc về nghị định thư xuất khẩu khoai lang, tổ yến Việt Nam sang Trung Quốc.', 'Trong ngày 9.11, Đại sứ quán Việt Nam tại Trung Quốc đã nhận được nghị định thư (phía Trung Quốc đã ký), về yêu cầu kiểm dịch thực vật đối với sản phẩm tổ yến và khoai lang của Việt Nam xuất khẩu sang Trung Quốc giữa Bộ NN-PTNT và Tổng cục Hải quan Trung Quốc.\r\n\r\nTheo đó, từ đầu năm 2022, Bộ NN-PTNT và Đại sứ quán Việt Nam tại Trung Quốc đã tăng cường các hoạt động thúc đẩy việc mở cửa thị trường của sản phẩm nông sản Việt Nam xuất khẩu sang Trung Quốc. Đến nay, hai bên đã hoàn tất việc mở cửa thị trường xuất khẩu cho quả sầu riêng và đang tiến hành thí điểm xuất khẩu đối với quả chanh leo vào thị trường Trung Quốc.\r\n\r\nGần đây nhất, Trung Quốc đã ký nghị định thư về yêu cầu kiểm dịch thực vật đối với quả chuối tươi, qua đó tạo điều kiện để xuất khẩu chuối tươi Việt Nam xuất khẩu chính ngạch sang Trung Quốc.\r\n\r\nThông tin từ Cục Bảo vệ thực vật (Bộ NN-PTNT) cho biết, khoai lang và tổ yến sẽ là sản phẩm nông sản thứ 12, 13 xuất khẩu chính ngạch vào thị trường Trung Quốc sau 11 loại quả gồm: thanh long, nhãn, chôm chôm, xoài, mít, dưa hấu, chuối, măng cụt, vải và sầu riêng.\r\n\r\nĐối với quả chanh leo, phía Trung Quốc đã đồng ý cho xuất khẩu thử nghiệm và chỉ đi qua cửa khẩu Quảng Tây của Trung Quốc. Sau khoai lang và tổ yến, Cục Bảo vệ thực vật sẽ tiếp tục các thủ tục để xuất khẩu quả bưởi và quả dừa tươi vào thị trường Trung Quốc.', 'ADMIN', '2024-05-08 07:34:58'),
(3, 'https://image.vtc.vn/resize/th/upload/2022/08/13/123-07194844.png', 'Có nên ăn nấm trong mùa mưa bão?', 'Mùa mưa bão đang kéo đến là “thời điểm vàng” cho các căn bệnh truyền nhiễm sinh sôi. Do đó, điều quan trọng nhất là phải tăng cường sức đề kháng của cơ thể trong giai đoạn này bằng một chế độ ăn lành mạnh và an toàn. Nấm có nên nằm trong chế độ ăn đó?', 'Rashi Chahal, một nhà dinh dưỡng học nổi tiếng, đã chia về mức độ an toàn của việc ăn nấm trong mùa mưa. Theo bà, để giữ được thân hình cân đối và khỏe mạnh trong những đợt gió mùa, bạn cần tuân thủ một chế độ ăn uống đầy đủ chất dinh dưỡng để tăng sức đề kháng. Đối với những người có sức khỏe kém, nên tránh ăn nấm vào khi trời trở gió vì nấm phát triển trong môi trường ẩm và có nhiều vi khuẩn gây bệnh sinh sôi bên trong.\r\nTuy nhiên, đừng quên rằng nấm cũng có rất nhiều lợi ích cho sức khỏe.\r\n\r\nLợi ích của nấm trong chế độ ăn uống thường ngày là gì?\r\n\r\nNếu bạn không phải đối tượng cần phải hạn chế sử dụng nấm trong giai đoạn gió mùa, thì việc kết hợp loại rau này trong chế độ ăn uống hằng ngày là vô cùng có lợi.\r\n\r\nNấm cung cấp chất béo, cholesterol có lợi, gluten, chất xơ và khi ăn nấm, bạn nạp rất ít lượng calo và natri cho cơ thể. Nấm cũng rất dồi dào vitamin B - một nguồn dinh dưỡng có khả năng tăng cường sức đề kháng, điều chỉnh hệ thống miễn dịch và hỗ trợ chống lại các bệnh truyền nhiễm, đặc biệt là trong giai đoạn này.\r\niTVC from Admicro\r\nBên cạnh đó, nấm giúp bảo vệ bạn bởi vì nó có tính kháng khuẩn mạnh và chống lại virus. Nhiều loại thuốc kháng sinh truyền thống được bào chế từ nấm. Một số loại nấm có tác dụng bổ dưỡng, củng cố hệ thống miễn dịch và cải thiện một số bệnh ung thư.\r\n\r\nLưu ý cách ăn nấm an toàn\r\n\r\nNấm sống trong môi trường tuyệt đối sạch, thân nấm lại ở dạng xốp và sợi nên khi rửa nấm sẽ làm nước đọng lại khiến cho nấm không còn được ngọt. Vì vậy không nên rửa kỹ, chỉ cần rửa nhanh dưới vòi nước lạnh, sau đó thấm chúng thật khô ráo.\r\n\r\nKhi chế biến các loại nấm, bạn nên nhẹ nhàng tránh làm nấm bị dập nát dễ nhiễm khuẩn.\r\n\r\nTuy nhiên, một số loại nấm bắt buộc phải vệ sinh nếu trong quá trình vận chuyển để gây bẩn vào, nhưng nên rửa dưới vòi nước dạng hơi sương chứ không rửa trực tiếp nước vào thân nấm sẽ làm hỏng thịt nấm.\r\n\r\nKhi sử dụng nấm tuyệt đối phải cắt bỏ chân (cắt gốc) vì chân nấm là nơi tiếp xúc với chất dinh dưỡng, phần bọc và nuôi cây giống là một số chất vô cơ mà chúng ta không nên sử dụng.\r\n\r\nCần ăn nấm được nấu chín hoàn toàn, tức là khoảng 5 - 10 phút sau khi đun sôi. Sau khi ăn nấm xong không nên dùng ngay đồ uống lạnh  như trà đá hoặc cà phê đá, bởi vì nấm mang tính bổ âm nên uống ngay đồ lạnh sau đó thì dễ bị lạnh bụng.', 'ADMIN', '2024-05-08 07:34:58'),
(4, 'https://image.vtc.vn/resize/th/upload/2022/08/01/1587009331-174-thumbnailschemaarticle-09370422.jpg', 'Những người nên tránh xa thịt vịt', 'Thịt vịt không chỉ thơm ngon mà còn đem lại nguồn dinh dưỡng rất tốt cho cơ thể, nhưng những người dưới đây tuyệt đối hạn chế ăn thịt vịt.\r\nThịt vịt là món ăn dân dã nhưng lại vô cùng độc đáo, chính vì vậy nó từ lâu đã trở thành món khoái khẩu của nhiều hộ gia đình Việt Nam. Vào mùa hè, thịt chỉ chỉ cần đem luộc, chấm cùng chút nước mắm gừng là đủ làm xao xuyến nhiều người.\r\nNhưng thịt vịt không chỉ ngon mà còn có hàm lượng dinh dưỡng rất cao. Trung bình trong 100g thịt vịt có khoảng 25g chất protein, hàm lượng này cao gấp nhiều lần lượng protein có trong thịt bò, thịt heo, thịt dê, cá, trứng. Ngoài ra, thịt vịt cũng cung cấp nhiều dưỡng chất như canxi, photpho, sắt, vitamin (B1, B2, A, D, E), acide nicotic…', 'Những thực phẩm đại kỵ với thịt vịt\r\n\r\nThịt vịt kỵ với quả mận\r\n\r\nThịt vịt tính hàn giúp giải nhiệt tốt cho cơ thể. Còn quả mận ăn vào nóng trong sẽ sinh nóng ruột. Nếu bạn ăn hai thực phẩm này gần thời gian với nhau hoặc ăn cùng một lúc sẽ gây ra bệnh khó tiêu, chướng bụng, nóng ruột hại cho sức khỏe.\r\n\r\nThịt ba ba\r\n\r\nLý do không nên ăn hai loại thực phẩm này chung với nhau được các chuyên gia giải thích như sau: Thịt ba ba tính ngọt, bình lại không độc, còn thịt vịt thì thuộc tính mát. Nếu ăn chung sẽ gây phù thũng, tiêu chảy. Ngoài ra, thịt ba ba có nhiều hoạt chất sinh học, thịt vịt chứa nhiều đạm, ăn chung với nhau sẽ làm biến chất đạm, giảm giá trị dinh dưỡng. Cho nên thịt vịt không nên ăn chung với thịt ba ba là như thế.\r\n\r\nTrứng gà\r\n\r\nTrứng gà và thịt vịt đều tính hàn, kết hợp với nhau có thể làm tổn hại đến nguyên khí trong cơ thể.\r\n\r\nThịt rùa\r\n\r\nCũng giống như thịt ba ba, nếu ăn thịt rùa chung với thịt vịt sẽ làm cho cơ thể bạn rơi vào tình trạng \"âm thịnh dương suy\", từ đó gây phù nề, tiêu chảy.\r\nTỏi\r\n\r\nTỏi có tính nóng, trong khi đó thịt vịt có tính hàn, nên nếu kết hợp sẽ không hề có lợi cho đường ruột và hệ tiêu hóa.\r\n\r\nNhững người không nên ăn thịt vịt\r\n\r\nNgười đang bị cảm\r\n\r\nKhi bạn vừa bị cảm xong thể trạng cơ thể còn nhiều mệt mỏi thì không nên ăn thịt vịt. Đặc biệt là khi bị cảm lạnh, bởi thịt vịt có tính hàn giúp giải nhiệt sẽ khiến cho cơ thể bạn lạnh bụng, tiêu chảy và khó chịu trong người làm người bệnh đang ốm càng ốm thêm\r\n\r\nNgười đang bị ho\r\n\r\nNhững người bị ho không nên ăn thịt vịt bởi trong thành phần thịt vịt có chất tanh, mà người ho thường phải kiêng tanh. Bởi ăn tanh sẽ khiến người bệnh khó thở. Mùi tanh trong thành phần của thịt vịt sẽ khiến cho người bệnh dễ ho thêm. Vì vậy, nếu trong nhà bạn có người ho thì đừng cho họ ăn thịt vịt kẻo rước thêm bệnh nhé.\r\n\r\nNgười bị bệnh gout\r\n\r\nTrong thành phần của thịt vịt có chứa hàm lượng purin và protein rất cao khiến cho axit uric trong cơ thể con người tăng cao. Vì vậy, với những người mắc bệnh gout không nên ăn thịt vịt kẻo tình trạng bệnh nguy hiểm hơn. Khi ăn thịt vịt người bệnh gout càng thêm nghiêm trọng hơn.\r\n\r\nNgười có hệ tiêu hóa kém\r\n\r\nVới những người đang mắc căn bệnh tiêu hóa, khó tiêu, chướng bụng, tiêu chảy.., thì tuyệt đối không nên ăn thịt vịt bởi thịt vịt chứa nhiều chất béo khiến cho hệ tiêu hóa tăng thêm gánh nặng làm bệnh tình thêm nặng hơn.\r\n\r\nNgười có thể chất yếu, lạnh\r\n\r\nTheo Đông y, thịt vịt có tính lành, đối với những người có thể trạng hàn lạnh thì nên hạn chế ăn thịt vịt, bởi sau khi ăn vào có thể sẽ gây lạnh bụng, dẫn đến cảm giác chán ăn, đau bụng, tiêu chảy hoặc các dấu hiệu tiêu hóa bất lợi khác.', 'ADMIN', '2024-05-08 07:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `total`, `address`, `note`) VALUES
(1, 15143465, '2024-05-08 07:15:36', 15040, 'ioeroio', 'whgiowhoirgh'),
(2, 15143465, '2024-05-08 07:25:39', 15200, 'abc', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `qty`, `price`, `img_url`, `description`) VALUES
(1, 1, 'Dưa lưới vỏ xanh', 10, 45000, '/products/11.png', 'Quả tròn, thịt màu cam, rất thơm và ngọt, độ đường 14 - 15%, trái nặng 1,3 - 1,5 kg.'),
(2, 1, 'Dưa hoàng kim', 20, 40000, '/products/12.png', 'Dưa Vàng Kim Hoàng Hậu. Trọng lượng quả 1,8kg/quả. Độ Brix >= 14.'),
(3, 1, 'Nho xanh không hạt', 25, 250000, '/products/13.png', 'Nho xanh Úc là một trong những giống nho phổ biến và được yêu thích nhất hiện nay, phần vỏ màu xanh lá cây khi chín ngả sang màu vàng, quả hình bầu dục, thịt dày chắc ngọt, nhiều nước và không có hạt.'),
(4, 1, 'Kiwi vàng Úc', 30, 250000, '/products/14.png', 'Kiwi vàng có thịt quả màu vàng trong rất đẹp mắt, với nhiều hạt đen tạo thành 1 vòng tròn xung quanh trục dọc của quả. Kiwi vàng có vị ngọt thanh mát rất đặc trưng.'),
(5, 2, 'Thịt lợn mán', 10, 160000, '/products/21.png', 'Thịt lợn sạch, được cho ăn thức ăn thiên nhiên.'),
(6, 2, 'Sụn Úc', 20, 75000, '/products/22.png', 'Sụn nhập từ Úc, bảo quản qua quy trình chuyên nghiệp.'),
(7, 2, 'Sườn già', 30, 60000, '/products/23.png', 'Sườn già tươi mổ trong ngày.'),
(8, 2, 'Ba chỉ bò Mỹ', 40, 160000, '/products/24.png', 'Ba chỉ bò Mỹ thái cuộn.'),
(9, 3, 'Bí xanh', 10, 10000, '/products/31.png', 'Bí sạch không thuốc trừ sâu.'),
(10, 3, 'Rau cải kale', 20, 25000, '/products/32.png', 'Rau sạch không thuốc trừ sâu.'),
(11, 3, 'Bắp cải Sapa', 30, 45000, '/products/33.png', 'Bắp cải sạch không thuốc trừ sâu.'),
(12, 3, 'Rau cải mèo', 40, 55000, '/products/34.png', 'Rau cải sạch không thuốc trừ sâu.'),
(13, 4, 'Ốc giác', 10, 185000, '/products/41.png', 'Ốc tươi mới đánh bắt.'),
(14, 4, 'Cua Cà Mau', 20, 339000, '/products/42.png', 'Cua tươi mới đánh bắt.'),
(15, 4, 'Râu bạch tuộc', 30, 50000, '/products/43.png', 'Bạch tuộc tươi mới đánh bắt.'),
(16, 4, 'Tôm sú', 40, 45000, '/products/44.png', 'Tôm sú mới đánh bắt.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password_hash`, `role`) VALUES
(1, 'ADMIN', 'admin@example.com', '0123456789', '$2y$10$I28YxXzeusOtIFG5rTqaQOaD1y/yOb5dThCME3QkQN83WY9QAc9eq', 'admin'),
(2, 'NGUYỄN VĂN A', 'nva@example.com', '0123456789', '$2y$10$/NtWnC3YkdgFYalW2jsad.gi.Ywel3.fNQr2v7AI0tV4o0vOAv6nS', 'customer'),
(3, 'NGUYỄN TRẦN MINH HUỆ', 'nguyentranminhhue@gmail.com', '0123456789', '$2y$10$o7qHSQL/rtBHqJlLZyF0qeq5X9Xi6YVKpmxAyH33N6FD25TLGPlw.', 'customer'),
(4, 'LÊ HOÀNG NAM', 'lehoangnam@gmail.com', '0123456789', '$2y$10$sh8iDrIwwtGimGbEtQM6SedmhPKuU/5vVpT0Y7HFmK4M/Bn4dJTz6', 'customer'),
(5, 'LÊ THỊ NGỌC THANH', 'lethingocthanh@gmail.com', '0123456789', '$2y$10$5bpOi10r.t/PNyqQXrw8vOl8SNG0HTWFV0Zj.Hy.6J2KKdqizLvkW', 'customer'),
(6, 'NGUYỄN THỊ THÚY LOAN', 'nguyenthithuyloan@gmail.com', '0123456789', '$2y$10$qMT/ljZZma2Gs4YQl4CM.ucT09IRaMOOSHMXBw/zpjsfWRUIDON6S', 'customer'),
(7, 'NGUYỄN THỊ KIM HOÀNG', 'nguyenthikimhoang@gmail.com', '0123456789', '$2y$10$gvBY7BXxMdPtcss1yUOASOZ6iR5fUuIl87xWwzwaWvF.h0F4R/NMm', 'customer'),
(8, 'NGUYỄN THỊ KIM YẾN', 'nguyenthikimyen@gmail.com', '0123456789', '$2y$10$6tYzxcIpONZku1FVdGFW8Oq3AbiCx0ECKCCnChODLHUIkEjWbffSa', 'customer'),
(9, 'NGUYỄN THANH TÀI', 'nguyenthanhtai@gmail.com', '0123456789', '$2y$10$fsYzl2CEHrbyuKYPhqFANuAi.kQ2ngl4xoBl.GetzWGHaCgkxUUYe', 'customer'),
(10, 'LÊ NGUYỄN HÙNG PHONG', 'lenguyenhungphong@gmail.com', '0123456789', '$2y$10$VGn/0RFyMiks/b6BmPojNuFLNSRzFQci5dHpx8ok3bABHJ7fDO3Ki', 'customer'),
(15143465, 'bcd', 'abc@gmail.com', '123456789', '$2y$10$27uNVr0.4qK1RNCLegXhpeaqYXCI6LFqP2o..CYfcUezCoiff/OlK', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`product_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15143466;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

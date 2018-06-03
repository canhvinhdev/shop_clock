-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2018 lúc 03:48 AM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_clock`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `aboutshop`
--

CREATE TABLE `aboutshop` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Fanpage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `aboutshop`
--

INSERT INTO `aboutshop` (`ID`, `Name`, `Email`, `Address`, `Phone`, `Fanpage`) VALUES
(1, 'SHOP HOA ONLINE 3 4', ' lienhe@shoponline.vn', ' 175 TÂY SƠN ĐỐNG ĐA HÀ NỘI', 1222222, 'a22â');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(10) NOT NULL,
  `Category_name` varchar(255) NOT NULL,
  `Parent_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `Category_name`, `Parent_id`) VALUES
(1, 'Đồng hồ nam', 0),
(2, 'Đồng hồ nữ', 0),
(7, 'Đồ hồ pin', 0),
(29, 'Đồng hồ cơ', 1),
(30, 'Đồng hồ cao cấp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `ID` int(10) NOT NULL,
  `User_ID` int(10) DEFAULT NULL,
  `Status` tinyint(2) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Created_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order`
--

CREATE TABLE `detail_order` (
  `ID` int(10) NOT NULL,
  `Order_ID` int(10) NOT NULL,
  `Product_ID` int(10) NOT NULL,
  `ProductName_DetailOrder` varchar(255) NOT NULL,
  `Quantity_DetailOrder` int(10) NOT NULL,
  `Price_DetailOrder` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `detail_order`
--

INSERT INTO `detail_order` (`ID`, `Order_ID`, `Product_ID`, `ProductName_DetailOrder`, `Quantity_DetailOrder`, `Price_DetailOrder`) VALUES
(39, 39, 1, 'HOA KHAI TRƯƠNG 2 TẦNG - HT06', 1, 2070000),
(40, 40, 1, 'HOA KHAI TRƯƠNG 2 TẦNG - HT06', 4, 2070000),
(41, 41, 1, 'HOA KHAI TRƯƠNG 2 TẦNG - HT06', 11, 2300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `ID` int(10) NOT NULL,
  `Discount` varchar(255) NOT NULL,
  `Attach_Discount` varchar(255) NOT NULL,
  `Start_Time` date NOT NULL,
  `End_Time` date NOT NULL,
  `Status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`ID`, `Discount`, `Attach_Discount`, `Start_Time`, `End_Time`, `Status`) VALUES
(1, 'Chào đón năm mới 2018', '<ul>\r\n	<li>Tặng ngay 1 vocer khi mua h&agrave;ng</li>\r\n	<li>Mua 5 sản phẩm&nbsp;tặng 1&nbsp;</li>\r\n</ul>\r\n', '2017-12-25', '2018-01-11', 0),
(2, 'Kỷ niệm shop được 3 tuổi', '<p>Tặng k&egrave;m 1 b&oacute; hoa Ly đẹp cho c&aacute;c sản phẩm gi&aacute; tr&ecirc;n 400k</p>\r\n', '2017-12-28', '2017-12-29', 0),
(3, 'Giờ vàng giá sốc', '<ul>\r\n	<li><strong>Tặng thiệp hoặc băng chữ k&egrave;m theo</strong></li>\r\n	<li><strong>Giảm 3% cho kh&aacute;ch h&agrave;ng đặt online với m&atilde; giảm gi&aacute; 2365</strong></li>\r\n	<li><strong>Giảm 5% cho kh&aacute;ch h&agrave;ng đ&atilde; đặt tại Đ', '2017-12-25', '2017-12-29', 0),
(4, 'Taaaa', '<p>aa</p>\r\n', '2017-12-23', '2017-12-27', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discountproduct`
--

CREATE TABLE `discountproduct` (
  `ID` int(10) NOT NULL,
  `Product_ID` int(10) NOT NULL,
  `Discount_ID` int(10) NOT NULL,
  `Number_Discount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `discountproduct`
--

INSERT INTO `discountproduct` (`ID`, `Product_ID`, `Discount_ID`, `Number_Discount`) VALUES
(9, 3, 3, 5),
(29, 3, 1, 4),
(31, 2, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `ID` int(10) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Summarize` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `News_Content` text NOT NULL,
  `Created_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`ID`, `Title`, `Summarize`, `Image`, `News_Content`, `Created_Date`) VALUES
(4, 'Vẻ đẹp hoa Xuyến Chi', '<p>Hoa nở quanh năm nhưng chủ yếu nở rộ v&agrave;o cuối xu&acirc;n, b&ocirc;ng hoa năm hoặc s&aacute;u c&aacute;nh m&agrave;u trắng bao quanh nhụy v&agrave;ng. Sau&nbsp;đ&oacute; c&aacute;c nhụy hoa c&oacute; hạt trong mỗi nhụy, đầu nhụy c&oacute; c&aacute;c m&uacute;i gai. C&aacute;c nhụy n&agrave;y di chuyển theo gi&oacute; hoặc b&aacute;m chặt v&agrave;o con người hoặc lo&agrave;i vật con vật di chuyển đến những nơi gặp điều kiện thuận lợi th&igrave; sinh trưởng tiếp theo. Nhờ đ&oacute; m&agrave; hạt hoa xuyến chi c&oacute; thể đến được nơi đất mới, nảy nở sinh s&ocirc;i.</p>\r\n', 'uploads/news.png', '<p>Hồn nhi&ecirc;n, hoang sơ như đồng nội l&agrave; cảm x&uacute;c khi n&oacute;i về lo&agrave;i hoa n&agrave;y, hoa xuyến chi c&oacute; mặt ở mọi địa h&igrave;nh: b&ecirc;n ghềnh đ&aacute;, b&atilde;i c&aacute;t, g&ograve; đất kh&ocirc;, đất hoang, b&ecirc;n đường t&agrave;u, triền đ&ecirc;, bờ mương, vệ đường&hellip; d&ugrave; m&ocirc;i trường c&oacute; nghiệt ng&atilde;, những b&ocirc;ng hoa xuyến chi b&eacute; nhỏ tươi tắn, lung linh men bờ k&ecirc;nh dẫn nước về ruộng xanh m&ecirc;nh m&ocirc;ng đ&atilde; tạo l&ecirc;n một thảm hoa trang tr&iacute; khoe sắc c&ugrave;ng đất trời, hoa xuyến chi thật giống như t&ecirc;n gọi khiến l&ograve;ng người xao xuyến.</p>\r\n\r\n<p><img alt=\"\" src=\"http://andy.vn/image/data/xuyen_chi_8.jpg\" /></p>\r\n\r\n<p>Lo&agrave;i hoa dại n&agrave;y c&oacute; sắc đẹp đến kỳ lạ để mỗi khi ai nhắc đến lo&agrave;i hoa xuyến chi đều bồi hồi xao xuyến</p>\r\n\r\n<p>&ldquo;Em th&aacute;ch cưới một v&ograve;ng hoa xuyến chi<br />\r\nĐể t&ocirc;i suốt trưa mải m&ecirc; khắp triền đồi lộng gi&oacute;<br />\r\nBới tung từng bụi cỏ<br />\r\nKhấp khởi vui mừng khi t&igrave;m được một nụ hoa</p>\r\n', '2017-11-08'),
(5, 'Ý Nghĩa Của Hoa Hồng Xanh', '<p>Hoa hồng được mệnh danh l&agrave; &ldquo;&nbsp;<a href=\"http://andy.vn/hoa-sinh-nhat-nguoi-yeu\">hoa của t&igrave;nh y&ecirc;u</a>&rdquo; . V&igrave; thế, nhiều người đ&atilde; chọn lo&agrave;i hoa n&agrave;y l&agrave;m th&ocirc;ng điệp biểu lộ t&igrave;nh cảm gửi tới người m&agrave; họ y&ecirc;u mến. Trong đ&oacute;, hoa hồng xanh được sử dụng như một sự lựa chọn ho&agrave;n hảo. M&agrave;u xanh l&agrave; m&agrave;u của trời v&agrave; biển. N&oacute; đi liền với cảm gi&aacute;c s&acirc;u thẳm v&agrave; y&ecirc;n b&igrave;nh. Ch&iacute;nh bởi vậy, hoa hồng xanh l&agrave; đại diện cho t&igrave;nh y&ecirc;u bất diệt, một t&igrave;nh y&ecirc;u chung thủy v&agrave; m&atilde;i m&atilde;i.</p>\r\n', 'uploads/news.png', '<p>Giống như c&aacute;c loại hoa hồng kh&aacute;c, hồng xanh c&oacute; nhiều &yacute; nghĩa đặc biệt. Trước ti&ecirc;n, n&oacute; mang&nbsp;<a href=\"http://andy.vn/hoa-valentine-14-2\">&yacute; nghĩa của sự huyền b&iacute;</a>.&nbsp; Con người thường hiếu kỳ với những điều b&iacute; ẩn, muốn được chinh phục v&agrave; l&agrave;m s&aacute;ng tỏ th&igrave; hồng xanh ch&iacute;nh l&agrave; sự thể hiện cho kh&aacute;t khao đ&oacute;. Chắc hẳn rằng, một người nhận được hoa hồng xanh sẽ kh&ocirc;ng ngừng phải t&ograve; m&ograve;, suy đo&aacute;n về th&ocirc;ng điệp m&agrave; người tặng muốn gửi gắm qua đ&oacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://andy.vn/image/data/hong%20xanh%203.jpg\" /></p>\r\n\r\n<p>M&agrave;u xanh l&agrave; m&agrave;u của hi vọng, ch&iacute;nh v&igrave; lẽ đ&oacute; m&agrave; hoa hồng xanh tượng trưng cho những điều kh&ocirc;ng thể trở th&agrave;nh hiện thực hoặc kh&ocirc;ng thể đạt được. N&oacute; được ngưỡng mộ v&agrave; đề cao như một giấc mơ. &Yacute; nghĩa của hoa hồng xanh gắn liền với sự mơ hồ kh&ocirc;ng thể nắm bắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lo&agrave;i hoa n&agrave;y cũng được sử dụng như một&nbsp;<a href=\"http://andy.vn/hoa-khai-truong\">biểu tượng của sự khởi đầu mới</a>. N&oacute; thể hiện được nhu cầu ri&ecirc;ng tư v&agrave; biệt lập. Hoa hồng xanh thể hiện sự phấn kh&iacute;ch v&agrave; những khả năng m&agrave; một doanh nghiệp mới mang lại. Những điều mới mẻ v&agrave; hứng th&uacute; say m&ecirc; được thể hiện trong m&agrave;u hoa n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://andy.vn/image/data/hong%20xanh%204.jpg\" /><img alt=\"\" src=\"http://andy.vn/image/data/hong%20xanh%205.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Một &yacute; nghĩa đặc biệt quan trọng, kh&ocirc;ng thể n&agrave;o chối c&atilde;i được. Đ&oacute; l&agrave;, hoa hồng m&agrave;u xanh thể hiện một t&igrave;nh y&ecirc;u vĩnh cửu. T&igrave;nh y&ecirc;u bắt đầu từ tia s&aacute;ng đầu ti&ecirc;n của con tim cho tới tận gi&acirc;y ph&uacute;t ngọt ng&agrave;o cuối c&ugrave;ng của hạnh ph&uacute;c. N&oacute; tồn tại m&atilde;i với thời gian. Với những đ&ocirc;i t&igrave;nh nh&acirc;n, d&agrave;nh tặng nhau những b&ocirc;ng&nbsp;<a href=\"http://andy.vn/hoa-tinh-yeu\">hoa hồng xanh</a>&nbsp;lu&ocirc;n l&agrave; một lựa chọn s&aacute;ng suốt v&agrave; tuyệt vời.</p>\r\n\r\n<p><img alt=\"\" src=\"http://andy.vn/image/data/hong%20xanh%206.png\" /><img alt=\"\" src=\"http://andy.vn/image/data/hong%20xanh%207.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bạn muốn gửi th&ocirc;ng điệp g&igrave; tới người m&igrave;nh y&ecirc;u thương? H&atilde;y đến với&nbsp;<a href=\"http://andy.vn/\">shop hoa tươi Andy</a>&nbsp;để được tư vấn v&agrave; chọn lựa những b&ocirc;ng hoa hồng xanh mang &yacute; nghĩa đặc biệt nhất nh&eacute;.</p>\r\n', '2017-11-08'),
(6, 'Hoa Făng Xê Và Ý Nghĩa', '<p>Hoa făng x&ecirc; c&oacute; nguồn gốc từ &quot;<em>Pens&eacute;e</em>&quot; trong tiếng Ph&aacute;p (sự tơ tưởng, nhớ nhung). Th&ocirc;ng thường tr&ecirc;n mỗi b&ocirc;ng hoa c&oacute; ba m&agrave;u nhưng c&aacute;c m&agrave;u được tổ hợp một c&aacute;ch ngẫu nhi&ecirc;n từ c&aacute;c m&agrave;u xanh, đỏ, v&agrave;ng, trắng, t&iacute;m, đen v&agrave; đ&acirc;y đ&atilde; trở th&agrave;nh sắc m&agrave;u lạ, hấp dẫn v&agrave; l&agrave; n&eacute;t đặc trưng của hoa Pens&eacute;e.</p>\r\n', 'uploads/news.png', '<p>Hoa făng x&ecirc; c&oacute; nguồn gốc từ &quot;<em>Pens&eacute;e</em>&quot; trong tiếng Ph&aacute;p (sự tơ tưởng, nhớ nhung). Th&ocirc;ng thường tr&ecirc;n mỗi b&ocirc;ng hoa c&oacute; ba m&agrave;u nhưng c&aacute;c m&agrave;u được tổ hợp một c&aacute;ch ngẫu nhi&ecirc;n từ c&aacute;c m&agrave;u xanh, đỏ, v&agrave;ng, trắng, t&iacute;m, đen v&agrave; đ&acirc;y đ&atilde; trở th&agrave;nh sắc m&agrave;u lạ, hấp dẫn v&agrave; l&agrave; n&eacute;t đặc trưng của hoa Pens&eacute;e.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"10427684_792811427451800_3598362986591630338_n.jpg\" src=\"http://andy.vn/image/data/FC1.jpg\" /></strong></p>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<p><strong>Hoa&nbsp;</strong>Pens&eacute;e c&ograve;n được gọi l&agrave;&nbsp;<strong>hoa bướm</strong>&nbsp;c&oacute; lẽ v&igrave; c&aacute;nh hoa nhiều m&agrave;u sắc, mỏng mượt như nhung v&agrave; c&oacute; h&igrave;nh dạng như con bướm đang đậu tr&ecirc;n c&agrave;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"1907929_792758077457135_1016332796436179466_n.jpg\" src=\"http://andy.vn/image/data/FC2.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Theo truyền thuyết, Pens&eacute;e l&agrave; t&ecirc;n một sứ thần c&oacute; tư duy s&acirc;u sắc v&agrave; c&oacute; c&aacute;ch ứng xử kh&eacute;o l&eacute;o tế nhị. Mang t&ecirc;n sứ thần Pens&eacute;e n&ecirc;n lo&agrave;i hoa nhỏ b&eacute; khi&ecirc;m nhường nhưng rất đỗi thanh cao n&agrave;y chứa trong m&igrave;nh đầy ẩn &yacute;. Khi người đ&agrave;n &ocirc;ng tặng hoa Pens&eacute;e cho một phụ nữ nhằm nhằm gửi lời nhắn nhủ thương nhớ &quot;<em>Thinking of You</em>&nbsp;&ldquo; đồng thời khẳng t&igrave;nh cảm v&agrave; hi vọng t&igrave;nh cảm của họ được đ&aacute;p trả một c&aacute;ch tế nhị. C&ograve;n người phụ nữ n&agrave;o nhận hoa Pens&eacute;e th&igrave; điều c&ocirc; ấy muốn n&oacute;i l&agrave;: &ldquo;T&ocirc;i đang mong chờ về một điều g&igrave; đ&oacute;.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"10167958_792747480791528_8710441280010467189_n (1).jpg\" src=\"http://andy.vn/image/data/FC3.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;<strong>Păng-x&ecirc;</strong>&nbsp;c&ograve;n l&agrave; một b&ocirc;ng hoa T&igrave;nh Y&ecirc;u. Bởi mỗi c&aacute;nh hoa h&igrave;nh tr&aacute;i tim tạo n&ecirc;n b&ocirc;ng hoa sẽ như một ph&eacute;p m&agrave;u nhiệm kỳ diệu t&igrave;nh y&ecirc;u, c&oacute; thể chữa l&agrave;nh những tr&aacute;i tim tan vỡ, an ủi những nỗi đau t&igrave;nh y&ecirc;u. v&agrave; nhất l&agrave;, nếu bạn lu&ocirc;n giữ ch&uacute;ng b&ecirc;n m&igrave;nh th&igrave; bạn sẽ chắc chắn nhận được t&igrave;nh y&ecirc;u của người m&igrave;nh y&ecirc;u.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"444970.jpg\" src=\"http://andy.vn/image/data/FC4.jpg\" /></p>\r\n', '2017-11-08'),
(10, 'Tìm hiểu những mẫu hoa đang bán chạy nhất 2018', '<p>Hoa făng x&ecirc; c&oacute; nguồn gốc từ &quot;<em>Pens&eacute;e</em>&quot; trong tiếng Ph&aacute;p (sự tơ tưởng, nhớ nhung). Th&ocirc;ng thường tr&ecirc;n mỗi b&ocirc;ng hoa c&oacute; ba m&agrave;u nhưng c&aacute;c m&agrave;u được tổ hợp một c&aacute;ch ngẫu nhi&ecirc;n từ c&aacute;c m&agrave;u xanh, đỏ, v&agrave;ng, trắng, t&iacute;m, đen v&agrave; đ&acirc;y đ&atilde; trở th&agrave;nh sắc m&agrave;u lạ, hấp dẫn v&agrave; l&agrave; n&eacute;t đặc trưng của hoa Pens&eacute;e.</p>\r\n', 'uploads/news.png', '<p>des</p>\r\n', '2017-12-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `ID` int(10) NOT NULL,
  `User_ID` int(10) DEFAULT NULL,
  `Shipping_Address` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Moblie_Number` int(11) NOT NULL,
  `Method_Payment` tinyint(2) NOT NULL,
  `Order_Time` date NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Note` text NOT NULL,
  `Order_Status` int(2) NOT NULL,
  `Status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`ID`, `User_ID`, `Shipping_Address`, `Name`, `Moblie_Number`, `Method_Payment`, `Order_Time`, `Subtotal`, `Note`, `Order_Status`, `Status`) VALUES
(39, 14, '175 Đê La Thành', 'Tràn Duc', 97544444, 0, '2017-12-24', 2070000, 'Ship nhanh', 0, 1),
(40, NULL, 'Hà Nam', 'Pham VInh', 957556644, 1, '2017-12-24', 8280000, 'qqqqq', 0, 0),
(41, NULL, '', '', 0, 1, '2018-06-03', 25300000, '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(10) NOT NULL,
  `Category_ID` int(10) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Images` varchar(255) NOT NULL,
  `Product_Price` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Description` text NOT NULL,
  `Status` tinyint(2) NOT NULL,
  `Created_Date` date NOT NULL,
  `Discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `Category_ID`, `Product_Name`, `Product_Images`, `Product_Price`, `Quantity`, `Description`, `Status`, `Created_Date`, `Discount`) VALUES
(1, 1, 'HOA KHAI TRƯƠNG 2 TẦNG - HT06', 'uploads/hoa1.jpg', 2300000, 6, '<p>Mẫu hoa gồm:</p>\r\n\r\n<p>+ Hoa lan v&agrave;ng</p>\r\n\r\n<p>+ Hoa ly</p>\r\n\r\n<p>+ Hoa đồng tiền</p>\r\n\r\n<p>- Chiết khấu 5%(tiền mặt) cho kh&aacute;ch h&agrave;ng mua hoa tươi cho doanh nghiệp.</p>\r\n\r\n<p>- Miễn ph&iacute; ship to&agrave;n Th&agrave;nh Phố.</p>\r\n\r\n<p>- Miễn ph&iacute; h&oacute;a đơn đỏ nếu qu&yacute; kh&aacute;ch c&oacute; nhu cầu.</p>\r\n\r\n<p>- Miễn ph&iacute; băng r&ocirc;n hoặc thiệp ch&uacute;c mừng.</p>\r\n\r\n<p>- Chiết khấu 5%(tiền mặt) cho kh&aacute;ch h&agrave;ng mua hoa tươi cho doanh nghiệp.</p>\r\n\r\n<p>- B&aacute;n h&agrave;ng to&agrave;n quốc.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n trẻ trung đầy nhiệt huyết v&agrave; d&agrave;y dặn kinh nghiệm, ch&uacute;ng t&ocirc;i lu&ocirc;n nỗ lực hết sức m&igrave;nh để l&agrave;m h&agrave;i l&ograve;ng qu&yacute; kh&aacute;ch h&agrave;ng.&nbsp;<br />\r\n- Điện hoa tươi cam kết sản phẩm hoa sinh nhật được thực hiện dựa tr&ecirc;n mẫu đ&atilde; chọn.<br />\r\n- Miễn ph&iacute; thiệp ch&uacute;c mừng, băng z&ocirc;n ( nếu c&oacute; nội dung ch&uacute;c mừng ).<br />\r\n- Gi&aacute; tr&ecirc;n đ&atilde; bao gồm thuế gi&aacute; trị gia tăng (VAT) .<br />\r\n- Sản phẩm được chuyển ph&aacute;t miễn ph&iacute; trong khu vực nội th&agrave;nh. Ri&ecirc;ng ngoại th&agrave;nh ph&iacute; ship sẽ từ 30-70.000đ.&nbsp;<br />\r\n- Thời gian giao h&agrave;ng nhanh nhất c&oacute; thể từ 30 ph&uacute;t kể từ khi kh&aacute;ch h&agrave;ng đặt h&agrave;ng (đối với c&aacute;c đơn h&agrave;ng gấp, tuỳ thuộc v&agrave;o y&ecirc;u cầu v&agrave; địa chỉ được giao).<br />\r\n- Dễ d&agrave;ng thanh to&aacute;n online với thẻ nội địa, quốc tế, Visa, Master, Paypal... ngay tại website<br />\r\n- Hoa tươi cam kết gửi h&igrave;nh ảnh thực tế sản phẩm của qu&yacute; kh&aacute;ch trước khi giao h&agrave;ng 30 ph&uacute;t(qua zalo hoặc c&aacute;c phương tiện li&ecirc;n hệ kh&aacute;c). Sản phẩm của ch&uacute;ng t&ocirc;i lu&ocirc;n mang những &yacute; nghĩa tốt đẹp nhất gửi tới người &nbsp;nhận.</p>\r\n\r\n<p>- K&egrave;m theo thiệp ch&uacute;c mừng, băng z&ocirc;n ( nếu c&oacute; nội dung ch&uacute;c mừng ).<br />\r\n- Gi&aacute; tr&ecirc;n chưa bao gồm thuế gi&aacute; trị gia tăng (VAT) .<br />\r\n- Dễ d&agrave;ng thanh to&aacute;n online với thẻ nội địa, quốc tế, Visa, Master, Paypal...<br />\r\n- Cam kết gửi h&igrave;nh ảnh thực tế sản phẩm của qu&yacute; kh&aacute;ch trước khi giao h&agrave;ng 30 ph&uacute;t(qua zalo hoặc c&aacute;c phương tiện li&ecirc;n hệ kh&aacute;c). Sản phẩm của ch&uacute;ng t&ocirc;i lu&ocirc;n mang những &yacute; nghĩa tốt đẹp nhất gửi tới người nhận.</p>\r\n\r\n<p>&Yacute; nghĩa của lẵng hoa m&agrave;u v&agrave;ng</p>\r\n\r\n<p>M&agrave;u v&agrave;ng tượng trưng cho sự gi&agrave;u sang v&agrave; vinh hoa ph&uacute; qu&yacute;, thời xưa c&aacute;c vị vua ch&uacute;a thường sử dụng m&agrave;u v&agrave;ng n&ecirc;n lẵng hoa khai trương m&agrave;u v&agrave;ng sẽ tượng trưng cho sự gi&agrave;u c&oacute; gia chủ nhận được lẵng hoa m&agrave;u v&agrave;ng l&agrave;m ăn ắt sẽ nhanh gi&agrave;u.&nbsp;</p>\r\n\r\n<p>&Yacute; NGHĨA CỦA KỆ HOA:<br />\r\nKệ hoa mang tới lời ch&uacute;c may mắn, ph&aacute;t t&agrave;i, ph&aacute;t lộc.&nbsp;</p>\r\n\r\n<p>Ng&agrave;y khai trương l&agrave; ng&agrave;y rất quan trọng đối với quan niệm của người phương đ&ocirc;ng, bởi ng&agrave;y khai trương l&agrave; ng&agrave;y khởi đầu cho một sự nghiệp mới, ng&agrave;y khai trương tốt đẹp th&igrave; từ sau trở đi sẽ thuận lợi. V&igrave; vậy khai trương cần chọn ng&agrave;y đẹp, giờ đẹp, th&aacute;ng đẹp, v&agrave; chọn người mở h&agrave;ng khai trương phải dễ t&iacute;nh, xởi nởi, tốt v&iacute;a l&agrave;m người mở h&agrave;ng, nhằm tr&aacute;nh gặp phải v&iacute;a của người kh&oacute; t&iacute;nh, &nbsp;hoặc người trầm lắng, ko nhanh nhẹn.</p>\r\n ', 1, '2017-11-01', 0),
(2, 1, 'Bó hoa baby đẹp', 'uploads/hoa2.jpg', 750000, 22, '<p>&nbsp;Miễn ph&iacute; ship to&agrave;n Th&agrave;nh Phố.&nbsp;</p>\r\n\r\n<p>- Chiết khấu 5%(tiền mặt) cho kh&aacute;ch h&agrave;ng mua hoa tươi cho doanh nghiệp.</p>\r\n\r\n<p>- Miễn ph&iacute; h&oacute;a đơn đỏ nếu qu&yacute; kh&aacute;ch c&oacute; nhu cầu.</p>\r\n\r\n<p>- Miễn ph&iacute; băng r&ocirc;n hoặc thiệp ch&uacute;c mừng.</p>\r\n\r\n<p>- B&aacute;n h&agrave;ng to&agrave;n quốc.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n trẻ trung đầy nhiệt huyết v&agrave; d&agrave;y dặn kinh nghiệm, ch&uacute;ng t&ocirc;i lu&ocirc;n nỗ lực hết sức m&igrave;nh để l&agrave;m h&agrave;i l&ograve;ng qu&yacute; kh&aacute;ch h&agrave;ng.&nbsp;<br />\r\n- Điện hoa tươi cam kết sản phẩm hoa ch&uacute;c mừng được thực hiện dựa tr&ecirc;n mẫu đ&atilde; chọn.<br />\r\n- Sản phẩm được chuyển ph&aacute;t miễn ph&iacute; trong khu vực nội th&agrave;nh. Ri&ecirc;ng Long Bi&ecirc;n, Gia L&acirc;m v&agrave; Đ&ocirc;ng Anh vui l&ograve;ng li&ecirc;n hệ để biết ph&iacute; Ship.&nbsp;<br />\r\n- Thời gian giao h&agrave;ng nhanh nhất c&oacute; thể từ 30p kể từ khi kh&aacute;ch h&agrave;ng đặt h&agrave;ng (đối với c&aacute;c đơn h&agrave;ng gấp, tuỳ thuộc v&agrave;o y&ecirc;u cầu v&agrave; địa chỉ được giao).<br />\r\n- K&egrave;m theo thiệp ch&uacute;c mừng, băng z&ocirc;n ( nếu c&oacute; nội dung ch&uacute;c mừng ).<br />\r\n- Dễ d&agrave;ng thanh to&aacute;n online với thẻ nội địa, quốc tế, Visa, Master, Paypal...<br />\r\n- &nbsp;Điện hoa h&agrave; nội Cam kết gửi h&igrave;nh ảnh thực tế sản phẩm của qu&yacute; kh&aacute;ch trước khi giao h&agrave;ng 30 ph&uacute;t(qua zalo hoặc c&aacute;c phương tiện li&ecirc;n hệ kh&aacute;c). Sản phẩm của ch&uacute;ng t&ocirc;i lu&ocirc;n mang những &yacute; nghĩa tốt đẹp nhất gửi tới người nhận.</p>\r\n\r\n<p>&nbsp;</p>\r\n ', 1, '2017-11-01', 0),
(3, 1, 'Hộp hoa tươi - Smile', 'uploads/hoa3.jpg', 2600000, 85, '<p>Hộp hoa tươi Smile Box MS175 gồm c&aacute;c loại hoa:</p>\r\n\r\n<p>- 15 hoa hồng trứng g&agrave;</p>\r\n\r\n<p>- 8 hoa hồng trắng</p>\r\n\r\n<p>- Cẩm chướng xanh</p>\r\n\r\n<p>- Hoa l&aacute; phụ kh&aacute;c</p>\r\n\r\n<p>** Cắm 1 mặt gi&aacute; 800.000</p>\r\n ', 1, '2017-11-01', 0),
(5, 1, 'BÌNH HOA 199 BÔNG - HT563', 'uploads/hoa4.jpg', 4500000, 8, '<p>aaa</p>\r\n ', 1, '2017-12-17', 0),
(6, 29, 'Hoa loại 2', 'uploads/2-1514475585.jpg', 5000000, 56, '<p>66666</p>\r\n', 0, '2017-12-28', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`ID`, `Title`, `Image`, `Url`, `Content`) VALUES
(1, 'Banner khuyến mãi giờ vàng', 'uploads/banner2-1513773072.jpg', '/nhom-san-pham', 'Banner khuyến mãi giờ vàng'),
(2, 'Giảm giá đón tết', 'uploads/banner1-1513773002.jpg', '/aa', 'Slide 2'),
(3, 'Happy birthay 3 year - Mừng sinh nhật shop 3 tuổi', 'uploads/banner2-1513773010.jpg', '/a', 'Slide 3'),
(4, 'Khuyến mãi giờ vàng', 'uploads/banner1.png', '/aa', 'Slide 4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DOB` varchar(255) DEFAULT NULL,
  `Sex` int(2) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Moblie_Number` int(11) DEFAULT NULL,
  `Status` tinyint(2) NOT NULL,
  `Permission` int(10) NOT NULL,
  `Registed_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `User_Name`, `Password`, `DOB`, `Sex`, `Address`, `Email`, `Moblie_Number`, `Status`, `Permission`, `Registed_Date`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2017-11-14 00:00:00', 1, 'Hà Nội', 'admin@gmail.com', 987655444, 1, 1, '2017-11-15'),
(10, 'Test', 'cfcd208495d565ef66e7dff9f98764da', '2017-12-06 00:00:00', 0, 'e', 'test@gmail.com', 988888888, 0, 0, '2017-12-24'),
(13, 'Khách hàng thân thiện', 'e10adc3949ba59abbe56e057f20f883e', '1995-11-02', 0, 'Hà nội', 'khachhang@gmail.com', 178999666, 1, 0, '2017-12-28'),
(14, 'quang dat', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 'dat@gmail.com', NULL, 1, 0, '2018-06-02'),
(15, 'đâ', 'cfcd208495d565ef66e7dff9f98764da', '0', 0, 'đá', 'qda@gmalcom', 9999999, 1, 0, '2018-06-02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `aboutshop`
--
ALTER TABLE `aboutshop`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `discountproduct`
--
ALTER TABLE `discountproduct`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `Discount_ID` (`Discount_ID`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `aboutshop`
--
ALTER TABLE `aboutshop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `discountproduct`
--
ALTER TABLE `discountproduct`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`ID`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`);

--
-- Các ràng buộc cho bảng `discountproduct`
--
ALTER TABLE `discountproduct`
  ADD CONSTRAINT `discountproduct_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `discountproduct_ibfk_2` FOREIGN KEY (`Discount_ID`) REFERENCES `discount` (`ID`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

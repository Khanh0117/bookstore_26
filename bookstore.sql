-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2023 lúc 07:35 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `Idcthd` int(11) NOT NULL,
  `Idhd` int(11) NOT NULL,
  `Idsp` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Tongtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`Idcthd`, `Idhd`, `Idsp`, `Soluong`, `Tongtien`) VALUES
(1, 1, 1, 1, 116),
(2, 1, 5, 1, 84),
(3, 2, 5, 1, 84),
(4, 3, 6, 1, 47),
(5, 3, 9, 1, 129.6),
(6, 3, 10, 2, 280),
(7, 3, 4, 1, 117),
(8, 3, 8, 1, 78.4),
(9, 2, 2, 1, 160),
(10, 4, 24, 1, 68),
(11, 4, 22, 1, 89.1),
(12, 5, 16, 2, 192),
(13, 5, 20, 1, 269.1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `Idhd` int(11) NOT NULL,
  `Ngaymua` date NOT NULL,
  `Ngaynhan` date NOT NULL,
  `Idtk` int(11) NOT NULL,
  `Ghichu` varchar(100) NOT NULL,
  `StatusHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`Idhd`, `Ngaymua`, `Ngaynhan`, `Idtk`, `Ghichu`, `StatusHD`) VALUES
(1, '2023-04-21', '2023-05-09', 2, 'Địa chỉ: 213', 3),
(2, '2023-04-27', '2023-05-17', 2, 'giao nhanh nha\r\n', 3),
(3, '2023-05-01', '2023-05-10', 4, 'COD', 2),
(4, '2023-05-17', '2023-05-17', 1, 'test\nThanh toán COD', 2),
(5, '2023-05-17', '2023-05-17', 1, 'test\r\nĐã thanh toán online	\r\nNgân hàng: ACB\r\nSố tài khoản: 123123\r\nTên tài khoản: ADMIN', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaphathanh`
--

CREATE TABLE `nhaphathanh` (
  `Idnph` int(11) NOT NULL,
  `Tennph` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaphathanh`
--

INSERT INTO `nhaphathanh` (`Idnph`, `Tennph`) VALUES
(1, 'Nhà xuất bản Kim Đồng - WingsBook'),
(2, 'Tsuki Light Novel'),
(3, 'Nhã Nam'),
(4, 'Amak Books'),
(5, 'Thái Hà'),
(6, 'IPM'),
(7, 'Huy Hoàng'),
(8, 'Alpha Books'),
(9, '1980 Books'),
(10, 'AZ Việt Nam'),
(11, 'Tân việt'),
(12, 'Shinebooks');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `Idpl` int(11) NOT NULL,
  `Tenphanloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`Idpl`, `Tenphanloai`) VALUES
(1, 'Văn học'),
(2, 'Truyện tranh'),
(3, 'Kinh tế'),
(4, 'Giáo khoa - Tham khảo'),
(5, 'Tiểu sử - Hồi ký'),
(6, 'Tâm lý- Kỹ năng sống'),
(7, 'Nuôi dạy con');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `Idrole` int(11) NOT NULL,
  `Rolename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`Idrole`, `Rolename`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `Idsp` int(11) NOT NULL,
  `Tensp` varchar(200) NOT NULL,
  `Tacgia` varchar(100) NOT NULL,
  `Minhhoa` varchar(100) NOT NULL,
  `Dichgia` varchar(100) NOT NULL,
  `Loaibia` varchar(20) NOT NULL,
  `Sotrang` int(11) NOT NULL,
  `Giasp` float NOT NULL,
  `Giamgia` float NOT NULL,
  `Giamoi` float NOT NULL,
  `Idnph` int(11) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Mota` varchar(10000) NOT NULL,
  `Idloai` int(11) NOT NULL,
  `StatusSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Idsp`, `Tensp`, `Tacgia`, `Minhhoa`, `Dichgia`, `Loaibia`, `Sotrang`, `Giasp`, `Giamgia`, `Giamoi`, `Idnph`, `Img`, `Mota`, `Idloai`, `StatusSP`) VALUES
(1, 'Tanya Chiến Ký 1: Deus Lo Vult', 'Carlo Zen', 'Shinotsuki Shinobu', 'Dương Gia Thịnh', 'Bìa mềm', 592, 145, 20, 116, 5, 'tanya1.jpg', 'Tanya Chiến ký (tên gốc: Youjo senki) là light novel đầu tay của tác giả Carlo Zen, minh họa bởi Shinotsuki Shinobu lấy đề tài chiến tranh, giả tưởng thời cận hiện đại trên một thế giới khác, tồn tại đồng thời pháo binh, những cỗ tăng thiết giáp và máy bay chiến đấu cùng với những ma pháp sư sử dụng ngọc diễn toán can thiệp vào thế giới vật lý bay lượn trên bầu trời.\r\n\r\nTanya chiến ký bắt đầu với khung cảnh một bé gái cất tiếng khóc chào đời tại một cô nhi viện, tuy nhiên, có vẻ như bé gái ấy lại tồn tại một ý thức khác, một ý thức chưa từng nghĩ tới rằng mình sẽ tái sinh thành một cô bé trong một thế giới thảm khốc như vậy. Ý thức ấy thuộc về một trưởng phòng nhân sự mẫn cán tại Nhật Bản xa xôi. Là một người làm công ăn lương mẫu mực, chăm chỉ nhưng không có lòng trắc ẩn và có phần vô tâm, từ khi đi học cho tới khi đi làm, anh ta luôn làm theo đúng y sì những gì mà xã hội và cấp trên mong muốn, tuân thủ mọi quy định và hoàn thành mọi mệnh lệnh từ trên xuống. Là người phụ trách nhân sự, trong thời buổi kinh tế khó khăn và đổi mới công nghệ, anh ta đã hoàn thành xuất sắc việc cắt giảm nhân sự không hiệu quả cho công ty, dẫu đó có là một nhân viên lâu năm hay dẫu người ấy có quỳ lạy khóc lóc như nào. Sự vô tình này đã khiến anh ta hứng thụ sự uất hận từ người bị sa thải, và trong một khoảnh khắc trước khi ý thức mất đi, anh ta vẫn nhớ rằng mình đang đứng đợi tàu điện ở sát đường ray rồi bị một ai đó đẩy từ phía sau.\r\n\r\nChính lúc này, cảm giác về không gian và thời gian xung quanh anh ta chợt ngừng lại. Một thực thể bí ẩn X tự xưng là thần xuất hiện, phê phán cách sống thiếu đức tin và lòng trắc ẩn của nhân loại ngày nay như anh ta. Sau một hồi phân trần, thực thể X kết luận, nếu phải sống trong một thế giới nhiều chiến loạn và hạn chế về cơ thể, hẳn sinh vật vô tâm và vô thần kia cũng sẽ nảy sinh đức tin và gửi những lời cầu nguyện lên thần linh. Khoảnh khắc này cũng đánh dấu sự chào đời của một bé gái có tên Tanya tại một cô nhi viện thuộc Đế Quốc, cường quốc quân sự tại một thế giới khác.\r\nBằng tài năng và sự tính toán, Tanya được thừa nhận là một ma pháp sư, nhanh chóng hoàn thành khóa học quân sự tại trường sĩ quan, được điều ra cụm tập đoàn quân phía tây của Đế Quốc để thực tập, trước khi bị cuốn vào xung đột biên giới giữa Đế Quốc và Liên Hiệp Hợp Thương.\r\n\r\nHình ảnh một bé gái dễ thương tóc vàng, mắt xanh bay giữa chiến trường hỗn loạn đau thương và mất mát trở thành một giai thoại, mở đầu cho câu chuyện về hành trình chứng minh giá trị bản thân để leo lên vị trí tốt với nhiều chế độ ưu đãi của cựu trưởng phòng nhân sự giờ đây mang hình hài một bé gái ở một thế giới khác có tên gọi Tanya Degurechaff!', 1, 1),
(2, 'Tanya Chiến Ký 2: Plus Ultra', 'Carlo Zen', 'Shinotsuki Shinobu', 'Sinh tố, Dương Gia Thịnh', 'Bìa mềm', 668, 200, 20, 160, 5, 'tanya2.jpg', 'Hành trình tiến thân tại thế giới khác trong thân thể một bé gái của vị cựu trưởng phòng nhân sự lại tiếp tục.\r\n\r\nNgay sau khi không đoàn ma pháp sư số 203 của Tanya được thành lập và hoàn thành khoá huấn luyện chưa được bao lâu, Đại công quốc Dacia láng giềng cử 60 vạn quân bộ binh tiến hành tấn công xâm lược Đế quốc. Bất chấp bộ tổng tham mưu rối loạn bởi tin tức đau đầu này, chỉ mình Tanya nhận thấy đây là cơ hội không thể tốt hơn để không đoàn non trẻ của cô có được kinh nghiệm thực chiến cũng như lập những chiến công đầu tiên.\r\n\r\nTừ series dị giới quân sự đình đám đã tạo tiếng vang cực lớn của tác giả Carlo Zen với hơn 4 triệu bản in được bán ra trên toàn thế giới.\r\n\r\nTiếp tục tiến lên phía trước bởi vì không còn lựa chọn nào khác. Plus Ultra!\r\n\r\nTrích đoạn sách:\r\n\r\nCâu hỏi đầu tiên của Không đoàn trưởng Degurechaff là về tình hình không chiến của mặt trận.\r\n\r\nKhi nhận được câu trả lời của người truyền tin từ Bộ Chỉ huy rằng không có thông tin nào về không lực địch, Không đoàn trưởng Degurechaff nghiêng đầu như thể vừa nhận được một báo cáo không thể tin nổi. Cô phải hỏi lại lần thứ hai, rằng đường truyền có đang bị vấn đề gì không?\r\n\r\nĐáp lại câu hỏi, sĩ quan liên lạc khẳng định đường truyền vô tuyến lẫn hữu tuyến đều bình thường. Và thậm chí, kênh liên lạc FAC từ trung tâm kiểm soát Dacia vẫn đang được kết nối.\r\n\r\nNgay sau khoảnh khắc báo cáo trên, các sĩ quan phụ trách của Bộ Tư lệnh cảm thấy một luồng hơi lạnh chạy dọc theo sống lưng mình.\r\n\r\nThiếu tá Degurechaff đang mỉm cười, thậm chí là đang cười với một vẻ mặt vui sướng tột độ. Trong giây phút ấy, không từ nào có thể diễn tả hết được sự kinh ngạc của toàn trụ sở.\r\n\r\nLúc đấy, không ai hiểu ra được ẩn ý đằng sau nụ cười ấy. Tuy nhiên, nếu bây giờ được nhìn thấy nụ cười mỉm đó có lẽ tôi cũng sẽ nở một nụ cười đáp lại y như vậy. Đó là nụ cười của một con thú săn mồi vô cùng dữ tợn, như niềm hân hoan của một con sói đói vừa nhìn thấy con mồi của mình.', 1, 1),
(3, 'Tanya Chiến Ký 3: The Finest Hour', 'Carlo Zen', 'Shinotsuki Shinobu', 'Sinh tố, Dương Gia Thịnh', 'Bìa mềm', 488, 159, 26, 117, 5, 'tanya3.jpg', 'Hành trình tiến thân tại thế giới khác trong thân thể một bé gái của vị cựu trưởng phòng nhân sự lại tiếp tục.\r\nBộ tổng tham mưu quân đội đế quốc, với đầu não là thiếu tướng tác chiến Ruderdorf và thiếu tướng hậu cầu Zettour, đã cho phát động kế hoạch rút lui quy mô lớn quân đội đế quốc tại chiến tuyến phía bắc. Một bản kế hoạch điên rồ, khiến tất cả những thành viên ban nội các của Đế quốc cảm thấy phẫn nộ, còn kẻ địch từ cộng hoà cho tới vương quốc Liên hiệp, đều cảm nhận được chiến tranh sắp kết thúc với phần thắng thuộc về mình. Bởi lẽ, khu công nghiệp phía Bắc đế quốc là một trong những công xưởng sản xuất khí tài quân sự phục vụ cho chiến tranh lớn nhất của Đế quốc. Mất đi tuyến hậu cần này, quân đội đế quốc sẽ không đủ khả năng tiếp tục chiến tranh nữa và buộc phải đầu hàng vô điều kiện.\r\nLẽ nào những vị tướng tài năng kia đã quá mệt mỏi với những cuộc chiến kéo dài và tình trạng trì trệ tới gần như bất động tại chiến tuyến Rhine, nên đã vạch ra một kế hoạch để bảo toàn lực lượng và gián tiếp tuyên bố đầu hàng cho quân Đế quốc? Hay đấy là con mồi béo bở nhằm che dấu những ý đồ đầy dã tâm chứa đựng trong những bộ não siêu việt kia, nhằm bẫy đối thủ vào một cuộc tổng phản công quy mô lớn?\r\nVượt qua được những khó khăn muôn trùng, thời khắc huy hoàng nhất sẽ tới! Tanya chiến ký 3 – The finest hour', 1, 1),
(4, 'Tanya Chiến Ký 4: Dabit Deus His Quoque Finem', 'Carlo Zen', 'Shinotsuki Shinobu', 'Sinh tố, Dương Gia Thịnh', 'Bìa mềm', 520, 159, 26, 117, 5, 'tanya4.jpg', 'Dabit deus his quoque finem – Rồi Chúa cũng đặt dấu chấm hết cho những vấn đề này.\r\n\r\nMặt trận phương Nam của Đế quốc giành được nhiều lợi thế trước tàn dư của quân đội Cộng hoà – Nước Cộng hoà tự do. Nhờ những đóng góp vô cùng tích cực, Tanya và không đoàn của mình được hiệu triệu về đế đô. Những tưởng chuỗi ngày tận hưởng yên bình ở hậu phương đáng mơ ước của Tanya sắp tới, nào ngờ đấy lại là lệnh thuyên chuyển không đoàn của cô đến một chiến tuyến còn nguy hiểm hơn nhiều – Liên Bang.\r\n\r\nVùng lãnh thổ khép kín của những người theo chủ nghĩa cực tả cực đoan – Liên Bang, rõ ràng là nguy hiểm hơn nhiều so với một đội quân đã từng bại trận như Cộng hoà tự do. Không chỉ vậy, Liên Bang cũng từng được xem là một cường quốc cả về kinh tế và quân sự, đến mức dù luôn thiết lập quan hệ hợp tác hữu hảo với Liên Bang, nhưng quân đội Đế quốc vẫn luôn phải duy trì cụm tập đoàn quân phương đông cực kỳ hùng hậu và không di dịch bất cứ một nguồn lực nào khỏi khu vực này, để đề phòng sự đe doạ từ người hàng xóm khó đoán này.\r\n\r\nVà rồi mối quan hệ hoà bình mỏng manh như đi trên lớp băng mỏng của Đế quốc và Liên bang cũng sắp sửa tới hồi tan vỡ. Tanya một lần nữa phải tham gia vào một cuộc chiến nguy hiểm mà mình không bao giờ muốn cuốn vào. Cuộc đổ bộ của Tanya và không đoàn ma pháp sư số 203 vào lãnh thổ Liên Bang, báo hiệu một trận chiến quy mô rộng khắp toàn thế giới, chính thức bắt đầu.', 1, 1),
(5, '86 - Eightysix - 1', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Thạch Linh', 'Bìa mềm', 392, 105, 20, 84, 6, '86ep1.jpg', 'Chín năm nay, Cộng hòa San Magnolia liên tục bị Legion - vũ khí tự hành của Đế quốc láng giềng tấn công. Để đối phó, Cộng hòa cũng phát triển vũ khí tự hành, giúp họ không phải đưa lính ra chiến trường, giảm thiểu triệt để thương vong về người.\r\n\r\nNhưng đó chỉ là bề nổi của tảng băng chìm. Đời nào có chuyện không ai phải chết.\r\n\r\nNgoài 85 khu hành chính chính thức, Cộng hòa còn lập ra Khu 86 trên phần lãnh thổ “phi nhân” từng bị Legion càn quét, gán cho những con người bị đày ra đó cái mác “Tám Sáu” và bắt họ bán mạng chiến đấu trong những cỗ “vũ khí tự hành có người lái”.\r\n\r\nCậu thiếu niên Shin trực tiếp dẫn dắt đồng đội nơi tử địa. Nữ sĩ quan trẻ tuổi Lena ở hậu phương chỉ huy họ bằng phương thức liên lạc đặc biệt. Câu chuyện về cuộc chiến đầy khốc liệt, đau thương và li biệt của cả hai sẽ đi về đâu…?\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 1, 1),
(6, 'Dược Sư Tự Sự (Manga) - Tập 1', 'Natsu Hyuuga (Hero Bunko/Shufunotomosha), Itsuki Nanao', 'Nekokurage, Touco Shino', 'Hide', 'Bìa mềm', 176, 47, 0, 47, 1, 'duocsu1_manga.jpg', 'Miêu Miêu là một cô gái làm công việc hầu hạ trong cung đình thời phong kiến.\r\nCâu chuyện của chúng ta bắt đầu với việc cô gái từng hành nghề dược sư ở phố hoa này nghe thấy người ta đồn thổi rằng: tất cả những đứa con của Hoàng đế đều đoản mệnh.\r\nBị thúc đẩy bởi niềm khát khao tri thức và tính hiếu kì cố hữu, Miêu Miêu bắt tay vào tìm hiểu nguyên nhân, xem đó như một cách giải khuây không hơn không kém.\r\n\r\n* WINGS BOOKS - Thương hiệu sách trẻ của NXB Kim Đồng hân hạnh gửi đến các bạn độc giả phiên bản chuyển thể manga đặc sắc của bộ light-novel siêu ăn khách DƯỢC SƯ TỰ SỰ!', 2, 1),
(7, 'Hành Trình Của Elaina - Tập 12', 'Jougi Shiraishi', 'Azure', 'Aki', 'Bìa mềm', 336, 118, 20, 94.4, 4, 'elaina12.jpg', 'Ngày xửa ngày xưa, có một cô phù thủy tên Elaina.\r\n\r\nCô đang trong chuyến hành trình chu du tự do, không bị ràng buộc bởi bất cứ ai hay bất cứ chuyện gì.\r\n\r\nLần này, chuyến ngao du sẽ đưa cô đến gặp những con người đầy cá tính…\r\n\r\nMột nhóm thợ săn yêu tinh và yêu tinh bóng tối lang thang tìm kiếm bạn đồng hành.\r\n\r\nNgười du hành giàu có trên con đường đấu tranh để lấy lại nụ cười cho con gái mình.\r\n\r\n“Phù thủy than củi” cùng em gái trong nhiệm vụ điều tra bí mật.\r\n\r\nCặp chị em đang tìm kiếm một mái ấm mới.\r\n\r\nMột nữ phù thủy cá tính mạnh mẽ nhắm đến công việc kinh doanh đầy nhiệt huyết.\r\n\r\nVà một thầy trừ tà trẻ tuổi dừng chân tại một ngôi làng nọ.\r\n\r\nNhững cuộc gặp gỡ và sự kiện lần này sẽ được viết lại trong nhật ký của Elaina như nào đây?\r\n\r\n\"Chà, nếu tôi đã ra tay thì mọi chuyện sẽ ổn thôi.”', 1, 1),
(8, 'Hành Trình Của Elaina – Tập 1', 'Jougi Shiraishi', 'Azure ', 'Hương Giang', 'Bìa mềm', 372, 98, 20, 78.4, 4, 'elaina1.jpg', 'Ở một xứ sở xa xôi, có một cô bé phù thủy thích ngao du thiên hạ. Tên cô là Elaina, biệt danh \"phù thủy tro tàn\". \r\n\r\nTrong hành trình trải dài thú vị của mình, Elaina đã gặp gỡ rất nhiều người và phiêu lưu đến nhiều vùng đất trên thế giới. \r\n\r\nMột vương quốc mà chỉ chấp nhận pháp sư, một gã khổng lồ mê cơ bắp, một thiếu niên muốn cứu người yêu khỏi lưỡi hái Tử thần, một cô công chúa bị bỏ mặc giữa thành phố hoang tàn đổ nát, và câu chuyện của chính cô phù thuỷ nhỏ vẫn đang chờ được kể... \r\n\r\nTừ khi gặp gỡ những nhân vật lạ thường và trải nghiệm những khoảnh khắc tươi đẹp của họ, đến tận bây giờ, cuộc sống của cô phù thuỷ nhỏ vẫn không ngừng xoay quanh câu chuyện của những cuộc gặp gỡ và chia ly. \r\n\r\n“Không sao đâu. Dù gì tôi cũng là khách lữ hành mà. Tôi phải mau đi thôi.” \r\n\r\nVâng, cô phù thủy đó chính là tôi.', 1, 1),
(9, 'Lời Nói Đùa 1: Vòng Xoáy Chặt Đầu - Bác Học Màu Lam Và Kẻ Thích Bông Đùa', 'Nisio Isin', 'Take', 'Trang', 'Bìa mềm', 500, 162, 20, 129.6, 3, 'zaregoto1.jpg', 'Lời nói đùa (Tên gốc: Zaregoto) của tác giả Nisio Isin.\r\n\r\n“Có thể yêu một ai đó không phải mình chính là một loại tài năng. Dù không bằng được các tài năng khác thì nó cũng phải gần bằng, nhưng nếu có nó mà không sử dụng thì cũng chẳng thể làm nên chuyện gì cả.”\r\n\r\n\"Tôi\", nhân vật chính của bộ truyện, đã cùng người bạn là kỹ sư thiên tài của mình đến du lịch ở một hòn đảo tụ hội rất nhiều thiên tài trong các lĩnh vực khác. Nhưng cuối cùng họ đã mắc kẹt vào một chuỗi án mạng vô cùng bí ẩn. Trong lúc phá giải vụ án này, cuối cùng \"tôi\" đã hiểu được rốt cuộc tài năng là thứ mang ý nghĩa nặng nề đến nhường nào.\r\n\r\nCâu chuyện thiên tài về những thiên tài, viết bởi một thiên tài.\r\n\r\nTác phẩm đầu tay viết năm mười tám tuổi đã đoạt ngay giải thưởng Mephisto danh giá, đưa tên tuổi Nisio Isin đến với độc giả Light Novel Nhật Bản, trở thành nguồn cảm hứng cho hàng loạt tiểu thuyết gia trẻ tuổi trong suốt thập kỷ đó.\r\n\r\nTRÍCH ĐOẠN\r\n\r\n“Chắc cậu cũng giỏi Toán lắm nhỉ? Thường thì con trai giỏi các môn khoa học tự nhiên hơn con gái. Có vẻ não bộ được quy định như vậy.”\r\n\r\n“Thật sao?”\r\n\r\n“Theo kết quả thống kê thì là vậy.”\r\n\r\n“Kết quả gì mà trọng nam khinh nữ thế…”\r\n\r\nMấy kết luận dựa trên kết quả thống kê toàn kiểu trời ơi đất hỡi. Gieo xúc xắc được 100 lần liên tiếp ra số 6 không có nghĩa lần tiếp theo cũng sẽ ra số 6. Nghe tôi nói vậy, Akane liền phản đối.\r\n\r\n“Con xúc xắc gieo 100 lần đều ra 6 chắc chắn sẽ mãi mãi chỉ ra 6. Bên trong con xúc xắc đó tồn tại một sự khác biệt có ý nghĩa, không thể giải thích bằng ngẫu nhiên hay lệch lạc tỉ lệ đơn thuần, kiểu như là vì cậu đen nên mãi chưa tung ra số khác đâu. Thống kê theo giới tính cũng như vậy… Ha ha, cậu về phe nữ quyền hả? Hay cậu ngại vì tôi là phụ nữ? Tiếc là tôi không theo nữ quyền đâu. Hễ nghe mấy chuyện vận động nữ quyền với giải phóng phụ nữ là tôi thấy sôi bụng ghê gớm. Họ chỉ toàn nói chuyện tào lao, cậu không thấy thế à? Phải thừa nhận thế giới hiện giờ đang xoay quanh đàn ông. Nhưng thứ đáng được cổ vũ không phải là bình đẳng giới, mà là sự bình đẳng về cơ hội cho mỗi người thể hiện tài năng. Nam nữ vốn dĩ đã khác biệt đến độ có thể coi là hai loài với di truyền khác hẳn nhau. Vì vậy tôi, Sonoyama Akane, cho rằng mỗi giới đều có vai trò và nghĩa vụ riêng. Đương nhiên, tiền đề trọng yếu là ngoài nghĩa vụ phải làm còn có ‘việc mà mình thật sự muốn làm’, hai cái đó tách biệt nhau, tiền đề thứ yếu là nếu phải chọn một trong hai thì nên ưu tiên việc mình muốn làm. À tất nhiên mình phải làm được việc mà mình muốn làm đã. Nhưng ít nhất tôi vẫn nghĩ rằng ‘tôi là đứa không làm được gì cả’ chỉ là một sự kiếm cớ, một con đường trốn tránh dễ dàng mà thôi.”\r\n\r\n“Tôi nghĩ vấn đề cũng nằm ở môi trường nữa.”\r\n\r\n“Môi trường. Nhưng đã có thời nào phụ nữ bị cấm viết văn, tạc tượng chưa? Với khuynh hướng hiện nay, tôi cảm thông với nam giới hơn. Có lẽ vì lập trường của tôi gần với họ hơn chăng, nhưng trước giờ có những việc vốn là lĩnh vực của nam giới mà. Giờ bị người khác chen chân vào thì ai mà chẳng bực?”\r\n\r\n“Nhưng trước giờ chúng ta đã sai, giờ mới đang phải làm cho đúng lại. Những người tiên phong bao giờ cũng vấp phải vô số khó khăn mà.”\r\n\r\nVừa tự hỏi không hiểu sao mình lại về phe nữ giới, tôi vừa phản bác Akane.', 1, 1),
(10, 'Lời Nói Đùa 2: Kẻ Siết Cổ Mộng Mơ - Zerozaki Hitoshiki - Mất Tư Cách Làm Người', 'Nisio Isin', 'Take', 'Đen Nhỏ', 'Bìa mềm', 560, 175, 20, 140, 3, 'zaregoto2.jpg', 'Lời Nói Đùa 2: Kẻ Siết Cổ Mộng Mơ - Zerozaki Hitoshiki - Mất Tư Cách Làm Người\r\n\r\nTháng Tư năm 2020, Công ty Cổ phần Văn hóa và Truyền thông Nhã Nam giới thiệu đến bạn đọc tập thứ hai của tựa truyện nổi tiếng tại Nhật Bản: Lời nói đùa (Tên gốc: Zaregoto) của tác giả Nisio Isin.\r\n\r\nYêu một người thì dễ, nhưng tiếp tục yêu họ thì khó. Cũng giống như giết người thì dễ, nhưng tiếp tục giết người thì khó vậy.\r\n\r\nTrung thực và chân thành, sống đến từng này tuổi mà không hề biết đến khái niệm dối trá, dù trong bất cứ hoàn cảnh nào cũng không thể rời mắt khỏi sự thật… nói tóm lại đó có thể coi là tính cách bẩm sinh của “tôi”, người đã chạm trán con quỷ giết người mang tên Zerozaki Hitoshiki vào một ngày tháng Năm. Đó vừa là một cuộc tao ngộ, vừa là điều đương nhiên phải tới. Đó là một ý chí sắc lẻm, một nguyên lý nhọn hoắt, và cũng là một trò đùa như mũi dao. Ngoài ra “tôi” còn có một cuộc gặp gỡ nho nhỏ với những người bạn cùng lớp nữa, nhưng cái đó thì chẳng biết nói sao, tôi chẳng biết nên bắt đầu kể từ chỗ nào. Bởi vì, này nhé, thân là con người, “tôi” làm sao nỡ nói dối cơ chứ…\r\n\r\nTác phẩm đầu tay viết năm mười tám tuổi đã đoạt ngay giải thưởng Mephisto danh giá, đưa tên tuổi Nisio Isin đến với độc giả Light Novel Nhật Bản, trở thành nguồn cảm hứng cho hàng loạt tiểu thuyết gia trẻ tuổi trong suốt thập kỷ đó.\r\n\r\nTRÍCH ĐOẠN\r\n\r\nMỗi khi nghĩ về Zerozaki, tôi chỉ có thể lý giải cậu ta bằng một khái niệm duy nhất: “hình ảnh phản chiếu trên mặt nước”. Nếu không hiểu như vậy, có lẽ hành động diễn tả kẻ mất tư cách làm người ấy bằng ngôn từ cũng sẽ trở nên vô nghĩa mất thôi. Nhưng thay vì suy xét về hành động diễn tả, có lẽ câu hỏi chúng ta cần phải trả lời sẽ là: Vốn ngay từ đầu ở Zerozaki có tồn tại thứ gọi là “ý nghĩa” hay không? Giống như danh xưng “kẻ thích đùa” của tôi không mang một ý nghĩa nào cụ thể, đánh giá kẻ giết người ấy thông qua biểu hiện bên ngoài chẳng khác nào tin vào mấy bài giải mẫu đã bị sai lầm từ lâu. Nên diễn tả cảm giác ấy thế nào nhỉ? Tựa như đang đứng trước bản thể của chính mình, tựa như đang nói chuyện với chính bản thân mình, một câu chuyện với cốt truyện vừa kỳ quặc lại vừa hợp lý.\r\n\r\nPhải rồi.\r\n\r\nCho nên, ngay từ đầu đây đã là một cuộc gặp gỡ tình cờ bất khả thi.\r\n\r\nCó lẽ, đó là trải nghiệm nguyên sơ nhất.\r\n\r\nLà ngôn từ đầu tiên mà ta nghe thấy.\r\n\r\nLà những ghi chép vào bộ nhớ gốc.\r\n\r\nLà quá khứ ta có thể liên tưởng và so sánh.\r\n\r\nLà véc-tơ cùng gốc, cùng phương hướng.\r\n\r\nTựa như còn bình thường hơn cả bình thường.\r\n\r\nTựa như hình ảnh phản chiếu trên mặt gương.\r\n\r\nNói tóm lại, chúng tôi quá giống nhau.', 1, 1),
(11, 'Lời Nói Đùa 3: Học Viện Treo Cổ - Đệ Tử Của Kẻ Thích Bông Đùa', 'Nisio Isin', 'Take', 'Đen Nhỏ', 'Bìa mềm', 300, 140, 20, 112, 3, 'zaregoto3.jpg', 'Có một quy tắc bạn buộc phải tuân thủ khi muốn kết thân với một người xa lạ, đó là luôn luôn yêu quý đối phương. Nói tóm lại, chúng ta có thể hiểu rằng kết thân với một người xa lạ nào đó là điều bất khả thi. Mà không, nội cái ý muốn kết thân với một người xa lạ nào đó, vốn đã rất bất bình thường rồi.\r\n\r\n“Tôi” là một người chính trực và thành thực, không bao giờ cho phép bản thân nói nhăng nói cuội, không thể bỏ qua bất cứ mâu thuẫn nào... Cuối tháng Sáu vừa rồi, khi còn chưa kịp thắc mắc nửa lời, “tôi” đã bị Người nhận khoán mạnh nhất nhân loại Aikawa Jun lôi đến Học viện Sumiyuri, ngôi trường danh giá dành cho các thiên kim tiểu thư. Và rồi học viện đó nảy sinh rắc rối. Nói “tôi” bị cuốn vào cũng đúng, nói “tôi” tự nhảy vào mớ bòng bong ấy cũng chẳng sai. Mà kệ đi, dù có thanh minh thanh nga như thế nào đi chăng nữa thì cũng chẳng có nghĩa lý gì. Bởi những rắc rối đã xảy ra vốn dĩ chỉ tựa như một lời nói đùa mà thôi.\r\n\r\nTập thứ ba trong câu chuyện về Lời nói đùa!', 1, 1),
(12, 'Dược Sư Tự Sự (Manga) - Tập 2', 'Natsu Hyuuga (Hero Bunko/Shufunotomosha), Itsuki Nanao', 'Nekokurage, Touco Shino', 'Hide', 'Bìa mềm', 176, 47, 10, 42.3, 1, 'duocsu2_manga.jpg', 'Miêu Miêu trước đây vốn là một dược sư, sau khi bị hoạn quan Nhâm Thị phát hiện ra tài năng, cô đã trở thành thị nữ của vị phi tần có tên là Ngọc Diệp. Cô nhận một mệnh lệnh trực tiếp từ “Hoàng đế”, nhưng công việc mà cô được uỷ thác ấy rốt cuộc là gì...!?\r\n\r\nTrong tập thứ 2 này, Miêu Miêu cũng hoạt động vô cùng tích cực!! Bị thôi thúc bởi niềm khát khao tri thức và tính hiếu kì cố hữu, cô bất ngờ thu hút sự chú ý của tất cả mọi người!!\r\n\r\n* WINGS BOOKS - Thương hiệu sách trẻ của NXB Kim Đồng hân hạnh gửi đến các bạn độc giả phiên bản chuyển thể manga đặc sắc của bộ light-novel siêu ăn khách DƯỢC SƯ TỰ SỰ!', 2, 1),
(13, 'Dược Sư Tự Sự (Manga) - Tập 3', 'Natsu Hyuuga (Hero Bunko/Shufunotomosha), Itsuki Nanao', 'Nekokurage, Touco Shino', 'Hide', 'Bìa mềm', 194, 47, 10, 42.3, 1, 'duocsu3_manga.jpg', 'Miêu Miêu đã giải đáp cho Nhâm Thị bối cảnh xuất hiện phần ăn có độc tại yến tiệc ngoài trời. Sau đó, mặc kệ Nhâm Thị bận tối mắt tối mũi với cả núi công việc còn dang dở, Miêu Miêu tận dụng cây trâm mình đã nhận được vào hôm diễn ra yến tiệc để lần đầu tiên sau 10 tháng, trở về phố hoa, cũng là trở về nhà.\r\n\r\nThế nhưng, cô lại bị vướng vào một vụ án mới...!?\r\n\r\nMời các bạn đọc tập 3 để chứng kiến khả năng suy luận ngày càng sắc bén của Miêu Miêu!!', 2, 1),
(14, '86 - Eightysix - 2', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Quang Phúc', 'Bìa mềm', 292, 105, 20, 84, 6, '86ep2.jpg', 'Sau khi từ biệt Lena, nữ Handler của Cộng hòa, nhóm Tám Sáu do Shin dẫn đầu được nước láng giềng Liên bang Giad đón nhận. Tại đây, họ được trao cơ hội hưởng hòa bình và tự do. Nhưng chỉ sau một thời gian nghỉ ngơi ngắn, họ đã chọn quay lại chiến trường. \r\n\r\nSau khi trở thành quân nhân Liên bang, họ tiếp tục xông pha trên những mặt trận ác liệt nhất, trước khi đối mặt với đợt tổng tấn công của Legion mà Shin dự báo được nhờ dị năng của mình. Lần này họ có thêm sự đồng hành của Frederica Rosenfort, một cô bé bí ẩn kém họ nhiều tuổi.\r\n\r\nĐối diện với câu hỏi “Tại sao lại chiến đấu?”, họ sẽ trả lời thế nào…?\r\n\r\nĐiều gì đã gọi “Tử thần” quay trở lại “địa ngục”…?', 1, 1),
(15, '86 - Eightysix - 3', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Minh Thúy', 'Bìa mềm', 380, 105, 20, 84, 6, '86ep3.jpg', 'Bằng những đợt pháo kích cự li siêu trường lên tới hàng trăm kilomet, lớp Legion mới trang bị railgun đã đập nát hàng thủ cuối cùng của Cộng hòa San Magnolia - nơi Lena trụ lại, sau đó gây tổn thất nặng nề cho phòng tuyến của Liên bang Giad - nơi Shin đang phục vụ.\r\nTrong tình thế ngặt nghèo cực độ, Liên bang quyết định mở một chiến dịch liều lĩnh đến độ điên rồ. Đó là lập một đơn vị cảm tử với vai trò “mũi giáo” chọc thẳng vào trận địa pháo gia tốc điện từ của Legion. Nòng cốt của đơn vị này chính là các Tám Sáu do Shin dẫn dắt.\r\nTrong quá trình thực hiện nhiệm vụ ấy, trái tim Shin không ngừng bị giằng xé. Rõ ràng cậu đã đưa tiễn anh trai, đã thoát khỏi Cộng hòa, vậy mà… \r\nTại sao “Tử thần” vẫn chiến đấu? \r\nVì cái gì? \r\nVì ai?', 1, 1),
(16, '86 - Eightysix - 4', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Quang Phúc', 'Bìa mềm', 340, 0, 20, 96, 6, '86ep4.jpg', 'Sau cuộc hội ngộ định mệnh, Shin và Lena nhanh chóng xích lại gần nhau, làm Frederica và Crena ngay ngáy lo sợ, còn Raiden và những người khác phải giữ ý đến phát mệt.\r\n\r\nTuy nhiên, quãng thời gian nghỉ ngơi ngắn ngủi nhanh chóng kết thúc. Đơn vị mới do Lena chỉ huy tác chiến nhận được nhiệm vụ đầu tiên. \r\n\r\nDưới ga tàu điện ngầm tại thành phố phía Bắc Cộng hòa, căn cứ khổng lồ của Legion đang đón đợi họ. Thứ ẩn sâu dưới đó là “mặt tối”. Của Legion. Của Cộng hòa. Và của cả những con người từng bị tổ quốc bức hại.\r\n\r\n“Tiếng gọi vọng lên từ lòng đất, báo hiệu thử thách mới cho nhóm thiếu niên.”', 1, 1),
(18, '86 - Eightysix - 5', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Minh Thúy', 'Bìa mềm', 400, 145, 20, 116, 6, '86ep5.jpg', '“Tới tìm ta đi.”\r\n\r\nSau khi Shin “nhìn” thấy lời nhắn được cho là của Zelena - người phát minh ra Legion, Lena cùng Lữ đoàn Biệt kích Cơ động 86 bước sang chiến trường Vương quốc Liên hiệp Roa Gracia - nơi phát hiện con Ameise màu trắng nghi là Zelena. Tuy nhiên…\r\n\r\nChẳng rõ là nhạo báng sự sống hay khinh nhờn cái chết, Vương quốc Liên hiệp đang áp dụng một chiến lược đi chệch luân thường để chống Legion, khiến ngay cả các Tám Sáu còn phải rùng mình. Tại đây, kẻ thù lẩn khuất trong rừng sâu lạnh giá và “cái chết” sát sườn không ngừng trêu đùa nhóm thiếu niên.\r\n\r\n“Lũ quái vật ẩn mình trong núi tuyết mỉm cười hỏi họ…”', 1, 1),
(20, 'Trọn Bộ 3 Tập Sherlock Holmes (Kèm Hộp)', 'Sir Arthur Conan Doyle', '', 'Nhiều người dịch', 'Bìa mềm,có hộp cứng', 2004, 345, 22, 269.1, 7, 'sherlockholmes.jpg', '“Tên tôi là Sherlock Holmes. Công việc của tôi là tìm hiểu những gì mà người khác không biết…”\r\n\r\nĐối với các độc giả yêu thích dòng văn trinh thám nói riêng cũng như những người yêu sách trên toàn thế giới nói chung thì không phải nói nhiều về sức hút của hai cái tên: nhà văn Conan Doyle và “đứa con tinh thần” của cả cuộc đời ông – Sherlock Holmes.\r\n\r\nNhân vật Sherlock Holmes từ lâu đã trở thành nguồn cảm hứng cho hàng trăm, hàng ngàn tác phẩm ở nhiều loại hình nghệ thuật khác: từ âm nhạc, ca kịch đến điện ảnh… Bộ sách Sherlock Holmes toàn tập (boxset trọn bộ 3 tập) một lần nữa mang đến cho người đọc cơ hội được nhìn ngắm, ngưỡng mộ và đánh giá nhân vật độc đáo của nhà văn tài năng Conan Doyle. Chân dung cuộc đời, sự nghiệp và nhân cách của Sherlock Holmes chưa bao giờ được tái hiện chân thực, đầy đủ và sống động đến thế… Chỉ từ một giọt nước, người giỏi suy luận có thể đoán ra rất nhiều chuyện liên quan đến một thác nước hay một đại dương dù họ chưa bao giờ tận mắt nhìn thấy chúng.Như vậy, cuộc sống là một chuỗi mắt xích rộng lớn nhất của nó, nếu ta biết được một mắt xích. Như tất cả mọi khoa học khác, “suy đoán và phân tích” là một khoa học mà ta chỉ có thể làm chủ nó sau một quá trình nghiên cứu dài lâu, bền bỉ.\r\n\r\nNgười mới đi vào lĩnh vực này nên bắt đầu bằng những vấn đề sơ đẳng: gặp bất kỳ ai, chỉ bằng vào sự quan sát, hãy cố tìm hiểu tiểu sử, nghề nghiệp hay thói quen của người ấy. Tuy có vẻ ấu trĩ nhưng thực ra sự thật này được rèn giũa các khả năng quan sát của ta và nó dạy cho ta biết cần phải nhìn thẳng vào đâu và phải tìm kiếm cái gì. Móng tay, những vết chai ở ngón trỏ và ngón cái, ống tay áo, đầu gối quần, dáng đi, cách đứng đều là những thứ nói lên nghề nghiệp của một con người…', 5, 1),
(21, 'Đọc Vị Bất Kỳ Ai (Tái Bản 2022)', 'TS David J Lieberman', '', 'Quỳnh Lê', 'Bìa Mềm', 223, 89, 15, 75.65, 5, 'docvi.png', 'Bạn băn khoăn không biết người ngồi đối diện đang nghĩ gì? Họ có đang nói dối bạn không? Đối tác đang ngồi đối diện với bạn trên bàn đàm phán đang nghĩ gì và nói gì tiếp theo?\r\n\r\nĐỌC người khác là một trong những công cụ quan trọng, có giá trị nhất, giúp ích cho bạn trong mọi khía cạnh của cuộc sống. ĐỌC VỊ người khác để:\r\n\r\nHãy chiếm thế thượng phong trong việc chủ động nhận biết điều cần tìm kiếm - ở bất kỳ ai bằng cách “thâm nhập vào suy nghĩ” của người khác. ĐỌC VỊ BẤT KỲ AI là cẩm nang dạy bạn cách thâm nhập vào tâm trí của người khác để biết điều người ta đang nghĩ. Cuốn sách này sẽ không giúp bạn rút ra các kết luận chung về một ai đó dựa vào cảm tính hay sự võ đoán. Những nguyên tắc được chia sẻ trong cuốn sách này không đơn thuần là những lý thuyết hay mẹo vặt chỉ đúng trong một số trường hợp hoặc với những đối tượng nhất định. Các kết quả nghiên cứu trong cuốn sách này được đưa ra dựa trên phương pháp S.N.A.P - cách thức phân tích và tìm hiểu tính cách một cách bài bản trong phạm vi cho phép mà không làm mếch lòng đối tượng được phân tích. Phương pháp này dựa trên những phân tích về tâm lý, chứ không chỉ đơn thuần dựa trên ngôn ngữ cử chỉ, trực giác hay võ đoán.\r\n\r\nCuốn sách được chia làm hai phần và 15 chương:\r\n\r\nPhần 1: Bảy câu hỏi cơ bản: Học cách phát hiện ra điều người khác nghĩ hay cảm nhận một cách dễ dàng và nhanh chóng trong bất kỳ hoàn cảnh nào.\r\nPhần 2: Những kế hoạch chi tiết cho hoạt động trí óc - hiểu được quá trình ra quyết định. Vượt ra ngoài việc đọc các suy nghĩ và cảm giác đơn thuần: Hãy học cách người khác suy nghĩ để có thể nắm bắt bất kỳ ai, phán đoán hành xử và hiểu được họ còn hơn chính bản thân họ.\r\nTrích đoạn sách hay:\r\n\r\nMột giám đốc phụ trách bán hàng nghi ngờ một trong những nhân viên kinh doanh của mình đang biển thủ công quỹ. Nếu hỏi trực tiếp “Có phải cô đang lấy trộm đồ của công ty?” sẽ khiến người bị nghi ngờ phòng bị ngay lập tức, việc muốn tìm ra chân tướng sự việc càng trở nên khó khăn hơn. Nếu cô ta không làm việc đó, dĩ nhiên cô ta sẽ nói với người giám đốc mình không lấy trộm. Ngược lại, dù có lấy trộm đi chăng nữa, cô ta cũng sẽ nói dối mình không hề làm vậy. Thay vào việc hỏi trực diện, người giám đốc khôn ngoan nên nói một điều gì đó tưởng chừng vô hại, như “Jill, không biết cô có giúp được tôi việc này không. Có vẻ như dạo này có người trong phòng đang lấy đồ của công ty về nhà phục vụ cho tư lợi cá nhân. Cô có hướng giải quyết nào cho việc này không?” rồi bình tĩnh quan sát phản ứng của người nhân viên.\r\n\r\nNếu cô ta hỏi lại và có vẻ hứng thú với đề tài này, anh ta có thể tạm an tâm rằng cô ta không lấy trộm, còn nếu cô ta đột nhiên trở nên không thoải mái và tìm cách thay đổi đề tài thì rõ ràng cô ta có động cơ không trong sáng.\r\n\r\nNgười giám đốc khi đó sẽ nhận ra sự chuyển hướng đột ngột trong thái độ và hành vi của người nhân viên. Nếu cô gái đó hoàn toàn trong sạch, có lẽ cô ta sẽ đưa ra hướng giải quyết của mình và vui vẻ khi sếp hỏi ý kiến của mình. Ngược lại, cô ta sẽ có biểu hiện không thoải mái rõ ràng và có lẽ sẽ cố cam đoan với sếp rằng cô không đời nào làm việc như vậy. Không có lí do gì để cô ta phải thanh minh như vậy, trừ phi cô là người có cảm giác tội lỗi…\r\n\r\n', 3, 1),
(22, 'Phong Thái Của Bậc Thầy Thuyết Phục (Tái Bản 2020)', 'Dave Lakhani', '', 'Thanh Mai, Đỗ Quyên, Hồng Khải', 'Bìa Mềm', 244, 99, 10, 89.1, 8, 'bacthay.jpg', 'Phong Thái Của Bậc Thầy Thuyết Phục (Tái Bản 2020) Là người bán hàng, bạn mong muốn có thể khiến khách hàng đưa ra quyết định mua hàng nhanh chóng. Là lãnh đạo, bạn mong muốn nhân viên luôn sẵn lòng ủng hộ và tin tưởng. Là người làm quảng cáo, bạn mong muốn bất cứ ai xem quảng cáo của mình cũng bị thu hút và buộc phải hành động... Để thực hiện thành công tất cả những điều đó, bạn không thể không có một kỹ năng hiệu quả - kỹ năng thuyết phục. Trong Phong thái của bậc thầy thuyết phục, bạn sẽ tìm thấy: Sự khác biệt căn bản giữa thuyết phục và dụ dỗ. Một sơ đồ hoàn chỉnh của quá trình thuyết phục. Một bộ công cụ thuyết phục và bảng hướng dẫn sử dụng chi tiết. Mười bảy chiến thuật thuyết phục cụ thể, hiệu quả. Đẳng thức thuyết phục. Sáu nguyên lý thuyết phục. Các bước trở thành chuyên gia thuyết phục trong chưa đầy 30 ngày. Các cách thuyết phục nhanh chóng mà bạn có thể làm chủ và sử dụng hàng ngày. Thuyết phục đích thực dựa trên lẽ phải, lòng chân thành, khả năng khơi gợi tính hiếu kỳ, kể chuyện hấp dẫn và giỏi nắm bắt mong muốn của người khác. Sự thuyết phục tuyệt vời là cả một nghệ thuật công phu - bản hòa âm tinh tế giữa bạn và người bạn muốn thuyết phục.', 7, 1),
(23, 'Sự Im Lặng Của Bầy Cừu (Tái Bản 2019)', 'Thomas Harris', '', 'Phạm Hồng Anh', 'Phạm Hồng Anh', 359, 115, 25, 86.25, 3, 'suimlang.jpg', 'Những cuộc phỏng vấn ở xà lim với kẻ ăn thịt người ham thích trò đùa trí tuệ, những tiết lộ nửa chừng hắn chỉ dành cho kẻ nào thông minh, những cái nhìn xuyên thấu thân phận và suy tư của cô mà đôi khi cô muốn lảng tránh... Clarice Starling đã dấn thân vào cuộc điều tra án giết người lột da hàng loạt như thế, để rồi trong tiếng bức bối của chiếc đồng hồ đếm ngược về cái chết, cô phải vật lộn để chấm dứt tiếng kêu bao lâu nay vẫn đeo đẳng giấc mơ mình: tiếng kêu của bầy cừu sắp bị đem đi giết thịt.\r\n\r\nSự im lặng của bầy cừu hội tụ đầy đủ những yếu tố làm nên một cuốn tiểu thuyết trinh thám kinh dị xuất sắc nhất: không một dấu vết lúng túng trong những chi tiết thuộc lĩnh vực chuyên môn, với các tình tiết giật gân, cái chết luôn lơ lửng, với cuộc so găng của những bộ óc lớn mà không có chỗ cho kẻ ngu ngốc để cuộc chơi trí tuệ trở nên dễ dàng. Bồi đắp vào cốt truyện lôi cuốn đó là cơ hội được trải nghiệm trong trí não của cả kẻ gây tội lẫn kẻ thi hành công lý, khi mỗi bên phải vật vã trong ngục tù của đau đớn để tìm kiếm, khẩn thiết và liên tục, một sự lắng dịu cho tâm hồn.\r\n\r\nNhận định\r\n“...xây dựng tình tiết đẹp với lối viết thông tuệ. Không tác phẩm kinh dị nào vượt được cuốn này.”\r\n- Clive Barker\r\n\r\n\r\n“Một cuốn sách giáo khoa đúng nghĩa về nghệ thuật viết truyện kinh dị, một kiệt tác chứa xung lực đưa nó lao vụt lên đỉnh cao không một khiếm khuyết... Harris đơn giản chính là tiểu thuyết gia kinh dị xuất sắc nhất thời nay.”\r\n- The Washington Post\r\n\r\n\r\n“Tiết điệu dồn dập... đánh thức sự tò mò... lôi cuốn.”\r\n- Chicago Tribune\r\n', 5, 1),
(24, 'Tư Duy Phản Biện', 'Zoe McKey', '', 'Jaden Minh', 'Bìa mềm', 172, 85, 20, 68, 9, 'tuduyphabien.jpg', 'Tư duy phản biện là chìa khóa để bạn thoát khỏi những lối mòn trong suy nghĩ, giúp bạn giải quyết các vấn đề khó khăn một cách sáng tạo và hiệu quả hơn. Cuốn sách \"Tư duy phản biện\" được viết bởi chuyên gia đào tạo Zoe McKey sẽ giúp bạn khai phá được sức mạnh trí óc của mình. Tác phẩm chứa đựng những bí quyết và chiến lược của các cá nhân thành công nhất, giúp người đọc có thể:\r\n\r\n\r\n- Khám phá chiều sâu tư duy\r\n\r\n\r\n- Đánh thức trí sáng tạo\r\n\r\n\r\n- Nắm bắt được cơ hội\r\n\r\n\r\n- Không ngại mơ ước\r\n\r\n\r\n- Vượt qua sự lo lắng\r\n\r\n\r\n- Quản lí thời gian hiệu quả\r\n\r\n\r\nĐọc xong tác phẩm, trực giác của bạn sẽ được mài sắc một cách rõ rệt, nhờ vậy khả năng đánh giá và đưa ra quyết định cũng được cải thiện, giúp bạn tự tin hơn trong mọi hành động.\r\n\r\n\r\nNếu đủ động lực để thực hành các phương pháp trong “Tư duy phản biện”, bạn sẽ học được một lối tư duy có định hướng, tập trung, kỉ luật và tự chủ. Bạn sẽ biết cách phân tích các tình huống từ nhiều góc độ khác nhau, không vội vàng đưa ra những kết luận sai lầm và chủ quan, có cái nhìn đúng đắn hơn với các hiện tượng trong cuộc sống, và không còn phải hối tiếc với các quyết định và hành xử của mình.', 3, 1),
(25, 'Dã Ngoại Thảnh Thơi - Yurucamp - Tập 1', 'afro', '', 'Hồng Hà', 'Bìa mềm', 176, 30, 10, 27, 1, 'yurucamp1.jpg', 'Trong chuyến cắm trại một mình đầu tiên, Rin dừng chân tại một sườn đồi kế bên núi Phú Sĩ. Ở khu tiếp tân, Rin thấy một cô bạn ngủ lăn ngủ lóc trên ghế băng. Đó là Nadeshiko, một học sinh mới chuyển đến vùng này. Vì quá thích thú khi biết nơi ở mới gần núi Phú Sĩ nên Nadeshiko đã nhào đi ngắm cảnh, trong lúc vội vã, cô đã cầm nhầm bộ bài Tây thay cho điện thoại di động… Kết quả là đến nơi trời nhiều mây, không ngắm được núi nên Nadeshiko ngủ gật. Đêm xuống, Rin đi vệ sinh thì gặp Nadeshiko vừa đói vừa lạnh lê lết như ma chơi trong rừng. Rin bèn “cứu mạng” cô bạn kì quặc kia bằng mì ly. Đúng lúc ấy, trăng lên cao, trời quang, và núi Phú Sĩ bỗng hiện lên đẹp tuyệt trần... \r\nVà câu chuyện nói về những chuyến đi \"phượt\" bất tận của chúng ta đã bắt đầu (một cách hết sức dễ thương) như thế... \r\n\r\nCác độc giả yêu Manga ở Việt Nam đã có bộ truyện nào về đề tài \"dã ngoại\" và đi \"phượt\" chưa!? Trong thời điểm dịch chuyển còn hạn chế thế này, với YURU CAMP, bạn hoàn toàn có thể \"du lịch qua trang sách\" cùng các cô nàng trong \"Hội mê dã ngoại\" khám phá những vùng đất mới. Không đơn thuần “khuyến khích đi du lịch, trải nghiệm”, bộ truyện còn đưa ra rất nhiều thông tin bổ ích. Chẳng hạn như làm thế nào để cắm trại mà tốt cho môi trường, đốt lửa sao cho an toàn, nên chuẩn bị đồ ăn nào cho tiện… Một \"Cẩm nang cắm trại\" thứ thiệt, và siêu thực tế!\r\n\r\nDẫu là đi du lịch một mình hay đi với bạn bè, thì mỗi hình thức đều có thú vui riêng cả. Nhưng sau cùng, “Hãy tận hưởng niềm vui khi được ở bên một ai đó”. Hãy đọc DÃ NGOẠI THẢNH THƠI để cảm nhận rõ thông điệp ấy nhé!', 2, 1),
(26, 'Dã Ngoại Thảnh Thơi - Yurucamp - Tập 5', 'Afro', '', 'Hồng Hà', 'Bìa mềm', 178, 30, 10, 27, 1, 'yurucamp5.jpg', '“Xin chào, tôi là afro. Cảm ơn các bạn đã mua “Dã ngoại thảnh thơi” tập 5. 5 tháng sau tai nạn ở hang động dưới chân núi Phú Sĩ, tôi cứ tưởng cuối cùng mình cũng được ra ngoài thì lại gặp Enoshima. Xem ra tin đồn toàn bộ hang động ở chân núi Phú Sĩ đều thông đến Enoshima là thật. Trước mắt cứ phải ra ngoài đã, tôi sẽ đi ăn Shirasu-don rồi về vậy.” - afro', 2, 1),
(27, 'Dã Ngoại Thảnh Thơi - Yurucamp - Tập 7', 'Afro', '', 'Hồng Hà', 'Bìa mềm', 178, 30, 10, 27, 1, 'yurucamp7.jpg', '“Xin chào, tôi là afro. Cảm ơn các bạn đã mua “Dã ngoại thảnh thơi” tập 7. Tôi đã đi tàu điện và xe bus từ Yugawara về khu cắm trại sau 3 tập vắng bóng, về đến nơi thì ngôi nhà (lều) đã bị dỡ mất tiêu rồi. Cắm trại kiểu này khắc nghiệt ghê!” - afro', 2, 1),
(28, 'Dã Ngoại Thảnh Thơi - Yurucamp - Tập 10', 'Afro', '', 'Hồng Hà', 'Bìa mềm', 178, 30, 10, 27, 1, 'yurucamp10.jpg', '“Xin chào, tôi là afro ro o\r\nCảm ơn các bạn đã mua “Dã ngoại thảnh thơi” tập 10 10 10\r\nTôi đã lạc trong hang động dưới lòng đất kể ở tập 9 suốt 2 tháng trời trời ời\r\nGiá mà khi nào trên mặt đất đông đúc quá, ta có thể chui xuống lòng đất cắm trại được thì hay biết mấy mấy ấy\r\nDưới đó lúc nào cũng tối om, tha hồ tận hưởng không khí ban đêm cùng lửa trại trại ại\r\nTừ giờ khéo lại rộ lên mốt cắm trại trong hang cũng nên nên ên\r\nCoong coong coong oong\r\nGrào grào rào ào\r\nBô lô ba la la a\r\nỐi chà, tôi nghe có tiếng gì vọng lại từ sâu trong hang ấy ấy ấy.”', 2, 1),
(29, 'BlueLock - Tập 1 - Tặng Kèm Obi + Standee Ivory + Card PVC', 'Muneyuki Kaneshiro, Yusuke Nomura', '', 'Yoda', 'Bìa mềm', 200, 35, 10, 31.5, 1, 'bluelock1.jpg', 'Tại World Cup 2018, Nhật Bản phải dừng bước ở vòng 16 đội…\r\n\r\nĐáp lại điều này, Liên đoàn Bóng đá Nhật Bản đã thiết lập một cơ sở đào tạo mang tên BLUELOCK, nơi tập hợp 300 tiền đạo đang là học sinh trung học, nhằm hướng tới mục tiêu vô địch World Cup. Người đảm nhiệm vị trí huấn luyện viên, Ego Jinpachi khẳng định rằng, yếu tố cần thiết cho nền bóng đá Nhật Bản chính là “một tiền đạo có cái tôi cao nhất”. Và những tiền đạo vô danh như Isagi Yoichi sẽ thử sức trong một khóa huấn luyện sống còn, biến bản thân trở thành những kẻ mang cái tôi to lớn ấy!\r\n\r\nĐỂ MỘT LẦN NỮA HIỆN THỰC HÓA GIẤC MỘNG ĐĂNG QUANG WORLD CUP, NỀN BÓNG ĐÁ NHẬT BẢN PHẢI BỊ KHAI TỬ!!\r\n\r\nMuneyuki Kaneshiro\r\n\r\n“Tôi rất thích bóng đá và cực kì yêu truyện tranh. Chính những suy tưởng ấy đã cho ra đời tác phẩm này. Rất mong các bạn sẽ đón nhận đứa con tinh thần của tôi.”\r\n\r\nYusuke Nomura\r\n\r\n“Trên tay các bạn đang là tập 1! Tôi sẽ cố gắng để những người yêu thích bóng đá lẫn người không biết gì về bóng đá đều có thể thưởng thức bộ truyện này.”', 2, 1),
(30, 'Thuật Thao Túng - Góc Tối Ẩn Sau Mỗi Câu Nói', 'Wladislaw Jachtchenko', '', 'Vũ Trung Phi Yến', 'Bìa mềm', 344, 139, 30, 97.3, 10, 'thuatthaotung1.jpg', 'Thuật Thao Túng\r\n\r\nBạn có muốn giành phần thắng cuối cùng trong các cuộc tranh luận?\r\n\r\nBạn có muốn dẹp đi bộ mặt kiêu ngạo của các đồng nghiệp xung quanh mình?\r\n\r\nBạn có muốn chứng minh rằng bạn đã đúng về mọi thứ?\r\n\r\nĐây là quyển sách chứa đựng đáp án mà bạn mong muốn. Thuật thao túng sẽ giúp bạn thuần thục các kỹ năng thuộc bộ môn “nghệ thuật” làm chủ cảm xúc, làm chủ vận mệnh, điều chỉnh tâm lý và đạt được thứ bạn muốn một cách tinh vi: thao túng tâm lý người đối diện, khiến họ hành động theo hướng ta mong đợi. Không những vậy, quyển sách còn giúp bạn nhìn nhận lại về định nghĩa thao túng, những tốt-xấu ẩn giấu đằng sau và giải đáp vấn đề đạo đức con người mà bạn luôn trăn trở khi thực hiện những hành vi này. Bật mí, con người khi vừa sinh ra đã làm một thao tác thao túng tâm lý người khác rồi đấy!\r\n\r\nCó thể bạn chưa biết, bạn đã và đang thao túng người khác hoặc bị người khác thao túng thông qua cử chỉ ngôn hành mỗi ngày, như-một-trò-đùa.\r\n\r\nCó thể bạn chưa biết, nạn nhân bị thao túng chưa chắc đã rơi vào tình thế bất lợi, nhưng rơi vào tình thế bất lợi chắc chắn đã bị thao túng.\r\n\r\nCó thể bạn chưa biết, người có đạo đức chắc chắn không thao túng người khác, nhưng kẻ thao túng người khác chưa chắc đã vô đạo đức.\r\n\r\nVới 10 kỹ năng và 37 thủ thuật, Thuật thao túng sẽ giúp bạn nhận ra và thoát khỏi những suy nghĩ xấu xa nơi tiềm thức của chính mình, đồng thời vạch trần góc tối ẩn giấu sau mỗi câu nói của đối phương, đưa những chiêu trò thao túng ấy ra ánh sáng để mọi người không lần nữa rơi vào cạm bẫy. Hơn cả, quyển sách này sẽ dẫn lối bạn trở thành một “nghệ nhân” thao túng có đạo đức.\r\n\r\nVề tác giả\r\n\r\nTác giả người Đức Wladislaw Jachtchenko - diễn giả hàng đầu châu Âu, người sáng lập Học viện Argumentorik giảng dạy về giao tiếp - dạy bạn cách giao tiếp phù hợp để đạt được điều bạn muốn.', 7, 1),
(31, 'Tâm Lý Học Tội Phạm - Phác Họa Chân Dung Kẻ Phạm Tội', 'Diệp Hồng Vũ', '', 'Đỗ Ái Nhi', 'Bìa mềm', 280, 145, 30, 101.5, 10, 'tamlyhoctoipham.jpg', 'TÂM LÝ HỌC TỘI PHẠM - PHÁC HỌA CHÂN DUNG KẺ PHẠM TỘI\r\n\r\nTội phạm, nhất là những vụ án mạng, luôn là một chủ đề thu hút sự quan tâm của công chúng, khơi gợi sự hiếu kỳ của bất cứ ai. Một khi đã bắt đầu theo dõi vụ án, hẳn bạn không thể không quan tâm tới kết cục, đặc biệt là cách thức và động cơ của kẻ sát nhân, từ những vụ án phạm vi hẹp cho đến những vụ án làm rúng động cả thế giới.\r\n\r\nLấy 36 vụ án CÓ THẬT kinh điển nhất trong hồ sơ tội phạm của FBI, “Tâm lý học tội phạm - phác họa chân dung kẻ phạm tội” mang đến cái nhìn toàn cảnh của các chuyên gia về chân dung tâm lý tội phạm. Trả lời cho câu hỏi: Làm thế nào phân tích được tâm lý và hành vi tội phạm, từ đó khôi phục sự thật thông qua các manh mối, từ hiện trường vụ án, thời gian, dấu tích,… để tìm ra kẻ sát nhân thực sự. \r\n\r\nĐằng sau máu và nước mắt là các câu chuyện rợn tóc gáy về tội ác, góc khuất xã hội và những màn đấu trí đầy gay cấn giữa điều tra viên và kẻ phạm tội. Trong số đó có những con quỷ ăn thịt người; những cô gái xinh đẹp nhưng xảo quyệt; và cả cách trả thù đầy man rợ của các nhà khoa học,… Một số đã sa vào lưới pháp luật ngay khi chúng vừa ra tay, nhưng cũng có những kẻ cứ vậy ngủ yên hơn hai mươi năm. \r\n\r\nBằng giọng văn sắc bén, “Tâm lý học tội phạm - phác họa chân dung kẻ phạm tội” hứa hẹn dẫn dắt người đọc đi qua các cung bậc cảm xúc từ tò mò, ngạc nhiên đến sợ hãi, hoang mang tận cùng. Chúng ta sẽ lần tìm về quá khứ để từng bước gỡ những nút thắt chưa được giải, khiến ta \"ngạt thở\" đọc tới tận trang cuối cùng. \r\n\r\nHy vọng cuốn sách sẽ giúp bạn có cái nhìn sâu sắc, rõ ràng hơn về bộ môn tâm lý học tội phạm và có thể rèn luyện thêm sự tư duy, nhạy bén.', 7, 1),
(32, 'Thiên Tài Bên Trái, Kẻ Điên Bên Phải (Tái Bản 2021)', 'Cao Minh', '', 'Thu Hương', 'Bìa mềm', 424, 179, 30, 125.3, 1, 'thientaibentrai.png', 'Thiên Tài Bên Trái, Kẻ Điên Bên Phải\r\n\r\nNẾU MỘT NGÀY ANH THẤY TÔI ĐIÊN, THỰC RA CHÍNH LÀ ANH ĐIÊN ĐẤY!\r\n\r\nHỡi những con người đang oằn mình trong cuộc sống, bạn biết gì về thế giới của mình? Là vô vàn thứ lý thuyết được các bậc vĩ nhân kiểm chứng, là luật lệ, là cả nghìn thứ sự thật bọc trong cái lốt hiển nhiên, hay những triết lý cứng nhắc của cuộc đời?\r\n\r\nLại đây, vượt qua thứ nhận thức tẻ nhạt bị đóng kín bằng con mắt trần gian, khai mở toàn bộ suy nghĩ, để dòng máu trong bạn sục sôi trước những điều kỳ vĩ, phá vỡ mọi quy tắc. Thế giới sẽ gọi bạn là kẻ điên, nhưng vậy thì có sao? Ranh giới duy nhất giữa kẻ điên và thiên tài chẳng qua là một sợi chỉ mỏng manh: Thiên tài chứng minh được thế giới của mình, còn kẻ điên chưa kịp làm điều đó. Chọn trở thành một kẻ điên để vẫy vùng giữa nhân gian loạn thế hay khóa hết chúng lại, sống mãi một cuộc đời bình thường khiến bạn cảm thấy hạnh phúc hơn?\r\n\r\nThiên tài bên trái, kẻ điên bên phải là cuốn sách dành cho những người điên rồ, những kẻ gây rối, những người chống đối, những mảnh ghép hình tròn trong những ô vuông không vừa vặn… những người nhìn mọi thứ khác biệt, không quan tâm đến quy tắc. Bạn có thể đồng ý, có thể phản đối, có thể vinh danh hay lăng mạ họ, nhưng điều duy nhất bạn không thể làm là phủ nhận sự tồn tại của họ. Đó là những người luôn tạo ra sự thay đổi trong khi hầu hết con người chỉ sống rập khuôn như một cái máy. Đa số đều nghĩ họ thật điên rồ nhưng nếu nhìn ở góc khác, ta lại thấy họ thiên tài. Bởi chỉ những người đủ điên nghĩ rằng họ có thể thay đổi thế giới mới là những người làm được điều đó. \r\n\r\nChào mừng đến với thế giới của những kẻ điên.', 1, 1),
(33, 'Cùng Bạn Trưởng Thành', 'Ying Shu', '', '', 'Bìa mềm', 216, 89, 20, 71.2, 10, 'cungbantruongthanh.jpg', 'Cùng Bạn Trưởng Thành\r\n\r\n“CÙNG BẠN TRƯỞNG THÀNH” - Cuốn sách lan tỏa đến bạn thông điệp “Không ngừng học tập, không ngừng nỗ lực” trên con đường khẳng định chính mình.\r\n\r\nNếu bạn đang tìm kiếm một người bạn đồng hành trong việc học tập ngoại ngữ và phát triển bản thân thì cuốn sách “Cùng bạn trưởng thành” chắc chắn là cuốn sách dành cho bạn. Đúng như tên gọi của nó, cuốn sách sẽ là người bạn sát cánh bên bạn mỗi ngày, ngoài ra còn truyền tải cảm hứng và thông điệp sống tích cực thông qua những trích dẫn ngắn song ngữ Trung - Việt, qua đó bạn có thể vừa trau dồi thêm kiến thức mới, vừa làm mới thế giới nội tâm của bản thân. Với ngoại hình nhỏ gọn và vô cùng xinh xắn, bạn cũng có thể dễ dàng sách mang theo bên mình để cuốn sách trở thành bạn đồng hành không thể thiếu trong cuộc sống và có thể thưởng thức bất cứ lúc nào bạn rảnh rỗi.\r\n\r\n“Mỗi một việc mà bạn đang cố gắng làm, chắc chắn sẽ đơm hoa kết trái vào những ngày tháng sau này” - Hi vọng đây sẽ là cuốn sách “kim chỉ nam” giúp bạn ngày một hoàn thiện bản thân, mạnh mẽ trưởng thành, làm một phiên bản chính mình hoàn hảo nhất.', 3, 1),
(34, 'Bắc Hành Lược Ký', 'Lê Quýnh', '', 'Nguyễn Duy Chính', 'Bìa mềm', 376, 125, 15, 106.25, 3, 'bachanh.jpg', 'Bắc hành lược ký là một “hồi ký chính trị” của Trường Phái hầu Lê Quýnh mà trọng điểm là mười năm ông bị cầm tù trong nhiều nhà ngục tại Trung Hoa sau khi theo vua Lê Chiêu Thống chạy sang phương Bắc lưu vong. Có thể xem nó như một phong vũ biểu đo lường gió mưa, thăng trầm của thời cuộc, phản ánh những lên xuống trong bang giao Thanh-Việt từ đời Quang Trung sang đời Cảnh Thịnh và sau cùng là đời Gia Long.\r\n\r\nBản dịch mới lần này dựa theo bản Hán văn của tạp chí Nam Phong, có đối chiếu, bổ túc, tham khảo các bản in trong Việt Nam Hán văn tiểu thuyết tùng san và lưu trữ tại Viện Hán Nôm Hà Nội, cùng những tài liệu, văn thư của triều Thanh trong cùng thời điểm, nhằm giúp bạn đọc có cái nhìn đa chiều, sáng tỏ hơn khi nghiên cứu về giai đoạn lịch sử từ cuối triều Lê đến đầu triều Nguyễn.', 10, 1),
(35, 'Kể Chuyện Cuộc Đời Các Thiên Tài: Beethoven - Nhà Soạn Nhạc Cổ Điển Vĩ Đại Thế Giới', 'Rasmus Hoài Nam', '', '', 'Bìa mềm', 165, 60, 15, 51, 11, 'beethoven.jpg', 'Beethoven - Nhà Soạn Nhạc Cổ Điển Vĩ Đại Thế Giới\r\n\r\nBeethoven sinh ngày 17 tháng 12 năm 1770, mất ngày 26 tháng 3 năm 1827. Ông là một hình tượng âm nhạc quan trọng trong giai đoạn giao thời từ thời kì âm nhạc cổ điển sang thời kì âm nhạc lãng mạn. Ông được cả thế giới công nhận là nhà soạn nhạc vĩ đại, nổi tiếng nhất và có ảnh hưởng tới rất nhiều nhà soạn nhạc, nhạc sĩ và khán giả về sau.\r\n\r\nCuốn sách gồm các câu chuyện về tuổi thơ, những năm tháng trưởng thành, cùng quá trình sáng tác những kiệt tác âm nhạc bất hủ của Beethoven.\r\n\r\nBeethoven được coi là người dọn đường cho thời kì âm nhạc lãng mạn. Cuộc sống của ông cũng có rất nhiều khó khăn. Cha ông là một người nghiện và thô lỗ, mẹ ông lại hay đau ốm, bản thân ông cũng phải chịu đựng sự hành hạ đau đớn về thể xác. Nhưng chúng ta có thể tìm thấy trong âm nhạc của ông là tinh thần vượt qua nghịch cảnh, chiến thắng sự tuyệt vọng và đau buồn để trở thành một thiên tài âm nhạc với những kiệt tác bất hủ.\r\n\r\nCuốn sách có giá trị tái hiện cuộc đời của một thiên tài, đồng thời đưa độc giả đến với thế giới âm nhạc cổ điển hấp dẫn và lí thú!', 12, 1),
(36, 'Cách Khen Cách Mắng Cách Phạt Con (Tái Bản 2021)', 'Masami Sasaki, Wakamatsu Aki', '', 'Song Liên, Linh Như', 'Bìa mềm', 180, 69, 20, 55.2, 5, 'cachkhen.jpg', 'Muốn con ngủ sớm thì nó lại chẳng chịu đi ngủ, muốn nó dừng bú mà nó cũng không chịu, lớn lên một chút thì nói cũng không nghe, vì nhút nhát mà bị thiệt thòi…Có rất nhiều vấn như vậy khiến chúng ta nhức đầu trong quá trình nuôi dạy con. Bất cứ người phụ nữ nào đã từng nuôi con đều hiểu rằng trên thế gian này rất nhiều việc không như mình muốn. Trong quyển sách này, tôi muốn giới thiệu một số quan điểm cơ bản và phương pháp nuôi dạy con dựa trên “cách khen”, “cách mắng”, “cách dạy dỗ” trẻ.\r\n\r\nNgay từ đầu, chúng ta phải làm sao để hiểu được con mình là đứa trẻ như thế nào? Phải nuôi dạy bằng cách nào? Việc hiểu được bản chất của sự phát triển của trẻ rất cần thiết đối với những bà mẹ đang gặp khó khăn trong quá trình nuôi dạy con.Chúng tôi đã nhận được nhiều bài viết chia sẻ về quan điểm nuôi dạy con cái dựa trên sự trưởng thành của trẻ từ Masami Sasaki, bác sĩ chuyên khoa tâm lý trẻ em, người đã tiếp xúc với rất nhiều với các bậc cha mẹ và con cái. Đối với con cái, điều quan trọng nhất là việc truyền đạt một cách dễ hiểu. Do đó, việc hiểu được “bản chất” của con cái là quan trọng. Với tư cách là một người mẹ, tôi nghĩ là có thể sử dụng “bí quyết” đó trong việc nuôi dạy con hằng ngày.\r\n\r\nLúc đó, tôi đã tới Salon Hidamari ở thành phố Akita của cô Wakamatsu Aki – nguyên là cựu giáo viên mẫu giáo. Salon Hidamari là nơi tổ chức các khóa huấn luyện dành cho các bà mẹ đang nuôi dạy con.Tại đây, thông qua truyện tranh và khoá học dành cho những người chăm sóc trẻ, tôi đã học được những bí quyết thành công của cô ấy để áp dụng vào việc nuôi dạy con.\r\n\r\nTrong cuốn sách này, ngoài những cuộc trò chuyện trao đổi kinh nghiệm về cách nuôi dạy từ bác sĩ Masami Sasaki và cô Wakamatsu Aki, chúng tôi cũng thêm vào một vài đoạn giới thiệu khi còn nhỏ họ đã được cha mẹ giáo dục con như thế nào.\r\n\r\nChúng tôi cảm thấy rất vui nếu quý vị độc giả tìm thấy được trong quyển sách này những lời khuyên hữu ích và có thể áp dụng thành công trong quá trình nuôi dạy trẻ.\r\n\r\n', 13, 1);
INSERT INTO `sanpham` (`Idsp`, `Tensp`, `Tacgia`, `Minhhoa`, `Dichgia`, `Loaibia`, `Sotrang`, `Giasp`, `Giamgia`, `Giamoi`, `Idnph`, `Img`, `Mota`, `Idloai`, `StatusSP`) VALUES
(37, 'Nguyên Tắc Thiết Kế Slide Chuẩn Ted', 'Akash Karia', '', '', 'Bìa mềm', 186, 65, 15, 55.25, 5, 'thietke.jpg', 'Người ta lựa chọn sử dụng slide để khiến thông điệp của họ trở nên dễ hiểu hơn, khiến thông điệp của mình dễ dàng được tiếp nhận và trở nên thú vị hơn.\r\n\r\nĐó chính là yếu tố mấu chốt đầu tiên bạn có thể rút ra từ cuốn sách này. Mỗi khi thiết kế slide, hãy tự hỏi bản thân:\r\n\r\nTôi đang tạo ra slide này để giúp khán giả hay bản thân mình?\r\n\r\nThay vì bấu víu vào slide như một chỗ dựa và sử dụng theo kiểu giấy ghi chép cỡ lớn để có thể nhớ những điều cần nói, những diễn giả tài ba trên sân khấu TED sử dụng slide để giúp khán giả, chứ không phải bản thân họ. Bạn có muốn biết bí quyết thiết kế slide đằng sau những bài diễn thuyết nổi tiếng khắp thế giới này không?\r\n\r\nNguyên tắc thiết kế slide chuẩn TED không phải là sách vỡ lòng đầy đủ về việc thiết kế bài thuyết trình. Tuy nhiên, nó bao quát tất thảy các yếu tố cần thiết. Nguyên tắc thiết kế slide chuẩn TED được viết rất cô đọng phù hợp cho những người không muốn lãng phí thời gian vào những điều vô bổ. Trong cuốn sách này, bạn sẽ tìm thấy các ví dụ về những slide hấp dẫn từ các bài TED talk ấn tượng, cùng với đó là những nguyên tắc thiết thực mà bạn có thể vận dụng để khiến bài thuyết trình của mình trở nên sống động.\r\n\r\nDẫu nó không phải là sách vỡ lòng đầy đủ về việc thiết kế slide, nhưng nếu thực hiện đầy đủ các nguyên tắc trong sách, bạn cũng sẽ khiến bài thuyết trình của mình tốt hơn 90% số diễn giả – nói cách khác – bài của bạn sẽ nằm trong top 10% bài thuyết trình chất lượng nhất.\r\n\r\nNhư vậy là đủ để tạo ra những bài thuyết trình ấn tượng thay vì những gạch đầu dòng nhàm chán rồi.\r\n\r\nCẤU TRÚC CỦA CUỐN SÁCH NÀY\r\n\r\nCuốn sách này được chia làm ba phần. Phần đầu tiên bàn luận ngắn gọn về thông điệp trong bài thuyết trình vì dẫu bạn thiết kế slide thuyết trình đẹp mắt đến nhường nào, nhưng nếu thông điệp dở tệ, bài thuyết trình của bạn cũng sẽ cùng chung số phận.\r\n\r\nPhần hai là nội dung chính của cuốn sách này. Bạn sẽ khám phá những nguyên tắc chung về việc thiết kế bài thuyết trình, từ đó có thể vận dụng để tạo ra những slide hiệu quả và hấp dẫn giúp bạn truyền tải thông điệp thay vì khiến chúng trở nên rối rắm.\r\n\r\nCuối cùng, phần ba tập trung vào những nguyên tắc mấu chốt để truyền tải các slide một cách sinh động và cuốn hút.\r\n\r\nTrong cuốn sách này, tác giả đưa ra những hướng dẫn cho phần mềm PowerPoint. Tuy nhiên, ngay cả khi bạn sử dụng phần mềm Keynote hoặc Prezi, các nguyên tắc được trình bày trong cuốn sách này vẫn hoàn toàn có thể áp dụng.', 14, 1),
(38, 'BlueLock - Tập 6 - Tặng Kèm Card PVC', 'Muneyuki Kaneshiro, Yusuke Nomura', '', 'Yoda', 'Bìa mềm', 192, 35, 10, 31.5, 1, 'bluelock6.jpg', 'BlueLock - Tập 6\r\n\r\nHỠI NHỮNG TIỀN ĐẠO, HÃY CHIẾN THẮNG BẰNG CHÍNH SỨC MÌNH!\r\n\r\nCHƯƠNG MỚI – VÒNG TUYỂN CHỌN THỨ 2, BẮT ĐẦU!!\r\n\r\nSau khi vượt qua vòng tuyển chọn thứ 2, Isagi và các thành viên đội Z lần lượt mở cánh cửa tiến vào vòng tuyển chọn thứ 2, nơi họ sẽ tự mình đương đầu với thử thách! Thứ nghênh đón họ chính là hệ thống thủ môn tối tân bậc nhất, BLUELOCK MAN. Khóa huấn luyện đó là gì!? Nội dung chi tiết của vòng tuyển chọn thứ 2 sẽ sớm được hé lộ! Cuộc chạm trán với những tiền đạo không quen biết và những trận đấu mới với luật lệ bất ngờ đang chờ đợi Isagi!!\r\n\r\nMUỐN ĐỨNG TRÊN ĐỈNH THẾ GIỚI PHẢI ĐÁNH BẠI CẢ KẺ ĐỊCH LẪN ĐỒNG ĐỘI! SÚT BÓNG ĐI!!\r\n\r\nMuneyuki Kaneshiro\r\n\r\n“Thể thao, không giống như cuộc sống, có thắng và thua. Tôi thích nó bởi vì nó tàn nhẫn, dứt khoát và đầy nhiệt huyết. Vừa nghĩ tới vừa nốc bia trước màn hình ti vi.”\r\n\r\nYusuke Nomura\r\n\r\n“Tôi rất thích phim và hoạt hình thể loại hành động gay cấn. Mong rằng các bạn độc giả cũng xem cuốn truyện này thuộc thể loại ấy.”', 2, 1),
(39, 'Dã Ngoại Thảnh Thơi - Yurucamp - Tập 9', 'Afro', '', 'Hồng Hà', 'Bìa mềm', 176, 30, 10, 27, 1, 'yurucamp9.jpg', '“Xin chào, tôi là afro. Cảm ơn các bạn đã mua “Dã ngoại thảnh thơi” tập 9. Lần trước tôi đã vô tình lạc vào một bãi diễn tập ở núi Phú Sĩ vì tưởng nhầm đó là khu cắm trại và bị bao vây giữa một đống xe cộ màu xanh lục đặc thù. Tôi đã tính đào hố để thoát thân nhưng giữa đường lại đi ra một không gian trông như hang động và hoàn toàn lạc lối. Lại thế rồi!!!!!!”', 2, 1),
(40, 'Dược Sư Tự Sự (Manga) - Tập 4', 'Natsu Hyuuga, Touco Shino, Itsuki Nanao, Nekokurage', '', 'Hide', 'Bìa mềm', 194, 47, 10, 42.3, 1, 'duocsu4_manga.jpg', 'Sau lần về quê rồi trở lại hậu cung, mỗi khi có chuyện phiền toái xảy ra, Miêu Miêu lại bị đủ các bên nhờ vả. Một lời uỷ thác mới của Nhâm Thị có liên hệ với thủ phạm gây ra vụ đầu độc bất thành Lí Thụ phi ở yến tiệc ngoài trời và hé lộ chân tướng của toàn bộ sự việc đó...!?\r\n\r\nTập 4 này là phần kết của hồi truyện về hậu cung, gói gọn toàn bộ nội dung cho đến hết tập 1 của tiểu thuyết nguyên tác!!\r\n\r\n* WINGS BOOKS - Thương hiệu sách trẻ của NXB Kim Đồng hân hạnh gửi đến các bạn độc giả phiên bản chuyển thể manga đặc sắc của bộ light-novel siêu ăn khách DƯỢC SƯ TỰ SỰ!', 2, 1),
(41, 'Diệt Slime Suốt 300 Năm, Tôi Levelmax Lúc Nào Chẳng Hay - Tập 12', 'Morita Kisetsu', 'Benio', 'Mai', 'Bìa mềm', 408, 149, 20, 119.2, 2, 'slime300ep12.png', 'Diệt Slime Suốt 300 Năm, Tôi Levelmax Lúc Nào Chẳng Hay - Tập 12\r\n\r\nDiệt slime suốt 300 năm, cuối cùng thì tôi cũng gặp được UFO rồi!?\r\n\r\nNhưng nghĩ lại, tôi vẫn nhìn thấy các hồn ma mỗi ngày đó thôi, vậy nên cũng không có gì đặc biệt cho lắm. Thế nhưng vẫn thật tuyệt vời khi được thấy những cô con gái yêu của mình náo động vì chuyện đó. Và đúng như dự đoán, chân tướng thực sự của chiếc UFO này chính là…!\r\n\r\nBên cạnh đó, trong tập này, tôi cũng sẽ tạo ra các món ăn mới từ gạo, đi tham quan các địa điểm tâm linh cùng các ác linh, và còn ra khơi tìm bạn của Slime Thông thái nữa.\r\n\r\nCuối truyện sẽ là trận chiến trường học đầy hỗn loạn của Raika trong ngoại truyện “Học viện Nữ sinh Rồng Đỏ”!', 1, 1),
(42, 'Mình Sẽ Tìm Cậu Vào Đêm Trăng Rằm', 'Yozora Fuyuno', '', 'Satoukibi', 'Bìa Mềm', 248, 109, 20, 87.2, 12, 'demtrang.jpg', 'Từ ngày không còn cha mẹ ở bên, tôi đã trở nên vô cảm với thế giới này. Mỗi ngày tôi đều say mê vẽ tranh, nhưng các bức tranh của tôi chỉ là tranh đen trắng, hoàn toàn không có một chút sắc màu. Bỗng một ngày có một người con gái rất đẹp, mang theo bầu không khí kỳ lạ xuất hiện. Dáng vẻ cô ấy lặng yên mỉm cười trước bức tranh mà tôi vẽ khiến tôi dần dần bị thu hút. Tuy nhiên thế giới trong mắt cô ấy đã hoàn toàn mất đi mọi màu sắc, thêm nữa số phận của cô ấy còn được định sẵn là “Càng hạnh phúc, cái chết sẽ càng cận kề”.\r\n“Tớ không muốn mất cậu…” Để có thể khiến thế giới của cô ấy bừng sáng trở lại, tôi đã đưa ra một quyết định quan trọng…\r\n\r\nTrích dẫn trong sách:\r\n\r\n“Giữa một đời dài rộng nhưng rất đỗi bình thường và một đời ngắn ngủi nhưng ngập tràn hạnh phúc, cậu sẽ chọn cái nào?”', 1, 1),
(43, 'Dược Sư Tự Sự (Manga) - Tập 5', 'Natsu Hyuuga (Hero Bunko/Shufunotomosha), Touco Shino, Itsuki Nanao, Nekokurage', '', 'Thảo Aki', 'Bìa mềm', 176, 47, 10, 42.3, 1, 'duocsu5_manga.jpg', 'Sau khi bị đuổi khỏi hậu cung một lần, Miêu Miêu được Nhâm Thị trực tiếp thuê về làm việc ở ngoại đình. Những lời nhờ vả giải mã các điều bí ẩn kích thích trí tò mò của Miêu Miêu tăng lên so với trước đây, lại còn có người đem đến các yêu cầu phiền nhiễu khác. Phải chăng thám tử lừng danh Miêu Miêu đã ra đời...!?\r\n\r\nTập thứ 5 khai màn một chương truyện mới!', 2, 1),
(44, 'Tuổi Trẻ Đáng Giá Bao Nhiêu (Tái Bản 2021)', 'Rosie Nguyễn', '', '', 'Bìa mềm', 291, 90, 20, 72, 3, 'IMG-6467b12451bc07.29191458.jpg', '“Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó, chẳng có ai phải mất ngủ.\r\n\r\nBạn trải qua những ngày tháng nhạt nhẽo với công việc bạn căm ghét, người ta chẳng hề bận lòng.\r\n\r\nBạn có chết mòn nơi xó tường với những ước mơ dang dở, đó không phải là việc của họ.\r\n\r\nSuy cho cùng, quyết định là ở bạn. Muốn có điều gì hay không là tùy bạn.\r\n\r\nNên hãy làm những điều bạn thích. Hãy đi theo tiếng nói trái tim. Hãy sống theo cách bạn cho là mình nên sống.\r\n\r\nVì sau tất cả, chẳng ai quan tâm.”\r\n\r\n“Tôi đã đọc quyển sách này một cách thích thú. Có nhiều kiến thức và kinh nghiệm hữu ích, những điều mới mẻ ngay cả với người gần trung niên như tôi.\r\n\r\nTuổi trẻ đáng giá bao nhiêu? được tác giả chia làm 3 phần: HỌC, LÀM, ĐI.\r\n\r\nNhưng tôi thấy cuốn sách còn thể hiện một phần thứ tư nữa, đó là ĐỌC.\r\n\r\nHãy đọc sách, nếu bạn đọc sách một cách bền bỉ, sẽ đến lúc bạn bị thôi thúc không ngừng bởi ý muốn viết nên cuốn sách của riêng mình.\r\n\r\nNếu tôi còn ở tuổi đôi mươi, hẳn là tôi sẽ đọc Tuổi trẻ đáng giá bao nhiêu? nhiều hơn một lần.”\r\n\r\n- Đặng Nguyễn Đông Vy, tác giả, nhà báo', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Idtk` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Avatar` varchar(100) DEFAULT NULL,
  `Idrole` int(11) NOT NULL,
  `StatusTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Idtk`, `Username`, `Password`, `Avatar`, `Idrole`, `StatusTK`) VALUES
(1, 'admin', '123', '', 1, 1),
(2, 'khach1', '321', '', 2, 1),
(3, 'test', '123', NULL, 2, 0),
(4, 'khach2', '123', NULL, 2, 0),
(5, 'khach3', '123', NULL, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `Idloai` int(11) NOT NULL,
  `Tenloai` varchar(30) NOT NULL,
  `Idpl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`Idloai`, `Tenloai`, `Idpl`) VALUES
(1, 'Light Novel', 1),
(2, 'Manga - Comic', 2),
(3, 'Kỹ năng sống', 6),
(5, 'Trinh thám', 1),
(7, 'Tâm lý học', 6),
(8, 'Bách khoa', 4),
(10, 'Chính trị', 5),
(11, 'Truyện ngắn', 1),
(12, 'Câu chuyện cuộc đời', 5),
(13, 'Cẩm Nang Làm Cha Mẹ', 7),
(14, 'Marketing - Bán Hàng', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Iduser` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `Diachi` varchar(200) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Sdt` int(11) NOT NULL,
  `Idtk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Iduser`, `Ten`, `Diachi`, `Mail`, `Sdt`, `Idtk`) VALUES
(1, 'I am Admin', '273 An Dương Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh', 'admin@gmail.com', 18008098, 1),
(2, 'Nguyen Van A', '294 Nguyễn Tri Phương, Phường 4, Quận 10, Thành phố Hồ Chí Minh', 'khach1@gmai.com', 907738923, 2),
(3, 'Test', 'USA', 'test@gmail.com', 231233, 3),
(4, 'khach2', 'EU', 'test2@gmail.com', 238958345, 4),
(5, 'Khach C', '', 'khachC@gmail.com', 2147483647, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_payment`
--

CREATE TABLE `users_payment` (
  `Idpay` int(11) NOT NULL,
  `Idtk` int(11) NOT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Sotk` int(15) DEFAULT NULL,
  `Tentk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users_payment`
--

INSERT INTO `users_payment` (`Idpay`, `Idtk`, `Bank`, `Sotk`, `Tentk`) VALUES
(1, 1, 'MB', 21323, 'ADmin'),
(3, 2, 'MB', 32190380, 'khach A'),
(24, 2, 'ACB', 312312231, 'KHACH A'),
(25, 1, 'ACB', 123123, 'ADMIN');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`Idcthd`),
  ADD KEY `hoadon_rel` (`Idhd`),
  ADD KEY `sanpham` (`Idsp`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Idhd`),
  ADD KEY `tkhd_rel` (`Idtk`);

--
-- Chỉ mục cho bảng `nhaphathanh`
--
ALTER TABLE `nhaphathanh`
  ADD PRIMARY KEY (`Idnph`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`Idpl`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Idrole`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Idsp`),
  ADD KEY `loaihang_rel` (`Idloai`),
  ADD KEY `nhaphathanh-rel` (`Idnph`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Idtk`),
  ADD KEY `Idrole` (`Idrole`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`Idloai`),
  ADD KEY `rel_phanloai` (`Idpl`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Iduser`),
  ADD KEY `tk_rel` (`Idtk`);

--
-- Chỉ mục cho bảng `users_payment`
--
ALTER TABLE `users_payment`
  ADD PRIMARY KEY (`Idpay`),
  ADD KEY `payment_rel` (`Idtk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `Idcthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `Idhd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhaphathanh`
--
ALTER TABLE `nhaphathanh`
  MODIFY `Idnph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `Idpl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `Idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `Idtk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `Idloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `Iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users_payment`
--
ALTER TABLE `users_payment`
  MODIFY `Idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `hoadon_rel` FOREIGN KEY (`Idhd`) REFERENCES `hoadon` (`Idhd`),
  ADD CONSTRAINT `sanpham` FOREIGN KEY (`Idsp`) REFERENCES `sanpham` (`Idsp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `tkhd_rel` FOREIGN KEY (`Idtk`) REFERENCES `taikhoan` (`Idtk`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `loaihang_rel` FOREIGN KEY (`Idloai`) REFERENCES `theloai` (`Idloai`),
  ADD CONSTRAINT `nhaphathanh-rel` FOREIGN KEY (`Idnph`) REFERENCES `nhaphathanh` (`Idnph`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `role_rel` FOREIGN KEY (`Idrole`) REFERENCES `role` (`Idrole`);

--
-- Các ràng buộc cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD CONSTRAINT `rel_phanloai` FOREIGN KEY (`Idpl`) REFERENCES `phanloai` (`Idpl`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `tk_rel` FOREIGN KEY (`Idtk`) REFERENCES `taikhoan` (`Idtk`);

--
-- Các ràng buộc cho bảng `users_payment`
--
ALTER TABLE `users_payment`
  ADD CONSTRAINT `payment_rel` FOREIGN KEY (`Idtk`) REFERENCES `taikhoan` (`Idtk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<?php 

	 include('simple_html_dom.php');
	 include ('Classes/PHPExcel/IOFactory.php');
	 //lấy ra content của tin
	 $link = 'https://dalieuhanoi.com/';
	 $url = array (
	 $link.'thuc-don-cho-benh-nhan-viem-da.html/',
	 $link.'cach-phong-va-chua-tri-viem-da-tiep-xuc-triet-de.html/',
	 $link.'phan-biet-cac-loai-viem-da-de-dieu-tri-an-toan-hieu-qua.html/',
	 $link.'benh-viem-da-va-nhung-bieu-hien-de-nhan-thay.html/',
	 $link.'cach-chua-tri-mot-so-loai-nam-da-thuong-gap.html/',
	 $link.'benh-nam-da-va-cach-phong-ngua.html/',
	 $link.'tac-hai-do-sai-lam-trong-chua-tri-hac-lao.html/',
	 $link.'benh-hac-lao-va-nhung-dieu-it-nguoi-biet.html/',
	 $link.'nguyen-nhan-va-cach-chua-tri-benh-a-sung.html/',
	 $link.'lam-gi-de-phong-ngua-benh-a-sung.html/',
	 $link.'benh-vay-nen-co-lay-khong.html/',
	 $link.'dau-hieu-nhan-biet-benh-vay-nen.html/',
	 $link.'benh-vay-nen-va-nhung-bien-chung-thuong-gap.html/',
	 $link.'tac-hai-va-cach-phong-tranh-benh-me-day.html/',
	 $link.'dau-la-thuc-don-cho-benh-nhan-me-day.html/',
	 $link.'dieu-tri-noi-me-day-man-ngua-khap-nguoi.html/',
	 $link.'benh-ngoai-da/benh-lang-ben/',
	 $link.'tac-hai-kho-luong-vi-chu-quan-voi-lang-ben.html/',
	 $link.'giai-phap-toi-uu-de-phong-tranh-benh-bach-bien-2.html/',
	 $link.'dia-chi-chua-benh-bach-bien-uy-tin.html/',
	 $link.'bach-bien-va-nhung-tac-hai-cua-no-de-lai-cho-nguoi-benh.html/',
	 $link.'di-ung-va-cach-dieu-tri-hieu-qua.html/',
	 $link.'ngan-chan-benh-to-dia-tai-phat.html/',
	 $link.'trieu-chung-va-cac-giai-doan-chuyen-bien-cua-benh-cham.html/',
	 $link.'benh-cham-da-nguyen-nhan-hinh-thanh-benh-va-cach-dieu-tri.html/',
	 $link.'dieu-tri-dut-diem-rung-toc-hieu-qua-an-toan.html/',
	 $link.'rung-toc-va-nhung-dau-hieu-nhan-biet-ve-benh.html/',
	 $link.'benh-vay-ca-neu-khong-dieu-tri-kip-thoi-ban-se-phai-song-voi-no-ca-doi.html/',
	 $link.'benh-ngoai-da/benh-ghe/',
	 $link.'nhan-dien-benh-ghe-de-dieu-tri-som.html/',
	 $link.'benh-ghe-va-nhung-dieu-can-biet.html/',
	 $link.'benh-zona-trieu-chung-va-bien-chung.html/',
	 $link.'nhung-dieu-can-biet-ve-benh-zona-than-kinh.html/',
	 $link.'bieu-hien-va-cach-dieu-tri-benh-lupus-ban-do.html/',
	 $link.'su-nguy-hiem-cua-benh-lupus-ban-do.html/',
	 $link.'nguyen-nhan-va-cach-chua-dut-diem-benh-viem-nang-long.html/',
	 $link.'dieu-tri-viem-nang-khong-kho-nhu-ban-nghi.html/',
	 $link.'sai-lam-cua-phu-huynh-khi-con-bi-thuy-dau.html/',
	 $link.'benh-thuy-dau-va-cach-dieu-tri-nhanh-khoi-khong-de-lai-seo.html/',
	 $link.'lay-nhan-mun-chuan-y-khoa-xoa-tan-noi-lo-ve-mun/',
	 $link.'cong-nghe-e-light-giai-phap-tri-mun-hoan-hao-nhat/',
	 $link.'phac-do-chua-tham-mun-hieu-qua-tu-bac-si/',
	 $link.'mesotherapy-mix-giai-phap-dot-pha-trong-dieu-tri-seo-ro/',
	 $link.'cham-dut-seo-ro-nho-cong-nghe-phi-kim-ket-hop-te-bao-goc/',
	 $link.'dieu-tri-nam-chuyen-sau-theo-phac-do-bac-si/',
	 $link.'tri-tan-nhang-cong-nghe-laser-nanotech/',
	 $link.'carbon-laser-bi-quyet-niu-giu-tuoi-xuan/',
	 $link.'cay-tinh-chat-dna-ca-hoi/',
	 $link.'xoa-sach-hinh-xam-khong-de-lai-seo/',
	 $link.'bi-mun-co-nen-dung-sua-rua-mat-khong.html/',
	 $link.'cach-chua-tri-tan-nhang-cho-nam-gioi.html/',
	 $link.'chua-mun-trung-ca-o-vung-lung-bang-cach-nao.html/',
	 $link.'mun-trung-ca-sau-day-thi.html/',
	 $link.'chua-nam-bang-laser-co-anh-huong-suc-khoe-khong.html/',
	 $link.'chua-tri-nam-an-toan-hieu-qua.html/',
	 $link.'chua-tham-sau-mun-co-de-lai-seo-khong.html/',
	 $link.'mun-o-lung-chua-bang-cach-nao.html/',
	 $link.'chua-mun-viem-mun-an-bang-cach-nao.html/',
	 $link.'quy-trinh-va-chi-phi-chua-tri-mun-an.html/',
	 $link.'vi-sao-nen-lua-chon-laser-nanotech-de-chua-tan-nhang.html/',
	 $link.'cach-phuc-hoi-da-nhiem-corticoid.html/',
	 $link.'dieu-tri-seo-lom-do-mun-o-nam-gioi-bang-cach-nao.html/',
	 $link.'lam-the-nao-de-het-seo-ro.html/',
	 $link.'dau-la-giai-phap-cho-phu-nu-bi-nam-sau-sinh.html/',
	 $link.'cach-xoa-hinh-xam-khong-de-lai-seo.html/',
	 $link.'da-kho-bong-troc-phai-lam-gi.html/',
	 $link.'phuong-phap-nao-tri-tham-mun-an-toan-hieu-qua.html/',
	 $link.'chua-tri-mun-bang-phuong-phap-vi-kim-dung-hay-sai.html/',
	 $link.'kinh-nghiem-va-chia-se-cua-mot-nguoi-bi-mun-lau-nam.html/',
	 $link.'nguy-hiem-tu-viec-su-dung-nhung-my-pham-tri-nam-ko-ro-nguon-goc-va-chua-qua-chi-dinh-cua-bac-si.html/',
	 $link.'baby-care.html/',
	 $link.'tacrolimus.html/',
	 $link.'lamisil-2.html/',
	 $link.'acid-fusidic.html/',
	 $link.'hydrocortisone.html/',
	 $link.'fucicort.html/',
	 $link.'azelaic-acid.html/',
	 $link.'hydroquinone.html/',
	 $link.'anzela-cream.html/',
	 $link.'retinoid.html/',
	 $link.'differin.html/',
	 $link.'acid-salicylic.html/',
	 $link.'corticoid-2.html/',
	 $link.'acneal.html/',
	 $link.'hiteen-gel-acne-treatment-preparations.html/',
	 $link.'dalacin-t-1.html/',
	 $link.'eumovate.html/',
	 $link.'mot-so-loai-thuoc-boi-ngoai-da-duoc-dung-pho-bien.html/',
	 $link.'thuoc-boi-ngoai-da.html/',
	 $link.'dau-oliu-cach-duong-da-hieu-qua-trong-qua-trinh-tri-nam.html/',
	 $link.'cach-cham-soc-da-trong-qua-trinh-dieu-tri-mun-ban-nen-biet.html/',
	 $link.'an-gi-de-chong-lao-hoa.html/',
	 $link.'noi-khong-voi-tri-mun-cap-toc.html/',
	 $link.'an-gi-de-tri-nam-tan-nhang-hieu-qua.html/',
	 $link.'tinh-trang-tang-sac-to-sau-viem-khi-dieu-tri-nam-tan-nhang.html/',
	 $link.'theo-bac-si-da-lieu-chung-ta-dang-mac-mot-so-sai-lam-khi-dung-kem-chong-nang.html/',
	 $link.'kem-tron-nguyen-nhan-gay-nam-da-va-nhung-hau-qua-khon-luong.html/',
	 $link.'dung-hay-sai-nhung-tac-dung-cua-vitamin-c-danh-cho-da.html/',
	 $link.'hau-qua-kinh-hoang-khi-su-dung-kem-tron-phu-nu-nhat-dinh-phai-biet.html/',
	 $link.'bi-mun-va-ton-thuong-da-do-su-dung-my-pham-chua-corticoid.html/',
	 $link.'vitamin-c-than-duoc-cho-lan-da-duoc-hang-trieu-chi-em-mo-uoc.html/',
	 $link.'nhung-cach-tri-mun-tu-thien-nhien-cac-ban-gai-dang-ri-tai-nhau.html/',
	 $link.'cao-long-mat-dung-cach-se-giup-da-ban-sang-len-trong-thay.html/');
 

	 $length = count($url);
	 $arr;
	 $c=0;
	 for($i=0;$i<$length;$i++)
	 {
	 	$html[$i] = file_get_html($url[$i]);
	 	$content[$i]='';
	 	$title[$i] = $html[$i]->find('h1',0)->plaintext;
	 	$img[$i] = $html[$i]->find('img',5);
	 	$p[$i] = $html[$i]->find('.page-content p');
	 	//echo $length;
		//echo $title[$i]->plaintext."<br>";
		//echo $img[$i]->src;
	 	// //lấy ra dũ liệu trog các thẻ <p>
	 	foreach ($p[$i] as $key =>$value) {
	 		//trường hợp chỉ có 1 thẻ p
	 			if($key==0)
	 			{
	 				$content[$i]= $value->plaintext."<br>";
	 			}
	 			//trường hợp nhiều thẻ p
	 			else
	 				$content[$i].= $value->plaintext."<br>";
	 		}
	 	$arr[$c] = array (
	 		'tuvan'=>array (
	 			'title'=>"$title[$i]",
	 			'content'=>"$content[$i]"
	 		)
	 	);

	 	$c++;	
	 	//echo $arr['tuvan']['title'].'<br>';
	// echo $content_arr[$c].'<br>';
	}
	echo $c;
	 // lấy ra hình ảnh
	 //   $url_img = array ($link.'benh-ngoai-da/benh-viem-da/',
	 //   	$link.'benh-ngoai-da/benh-nam-da/',
	 //   	$link.'benh-ngoai-da/benh-hac-lao/',
	 //   	$link.'benh-ngoai-da/benh-a-sung/',
	 //   	$link.'benh-ngoai-da/benh-vay-nen/',
	 //   	$link.'benh-ngoai-da/benh-me-day/',
	 //   	$link.'benh-ngoai-da/benh-lang-ben/',
	 //   	$link.'benh-ngoai-da/bach-bien/',
	 //   	$link.'benh-ngoai-da/di-ung-da/',
	 //   	$link.'benh-ngoai-da/benh-to-dia/',
	 //   	$link.'benh-ngoai-da/benh-cham/',
	 //   	$link.'benh-ngoai-da/benh-rung-toc/',
	 //   	$link.'benh-ngoai-da/benh-vay-ca/',
	 //   	$link.'benh-ngoai-da/benh-ghe/',
	 //   	$link.'benh-ngoai-da/benh-zona/',
	 //   	$link.'benh-ngoai-da/benh-lupus-ban-do/',
	 //   	$link.'benh-ngoai-da/benh-viem-nang-long/',
		// $link.'benh-ngoai-da/benh-thuy-dau/');
	 //   	$length_img = count($url_img);
	 //   	$img_arr;
	   	// $j=0;
	   	// for ($i=0; $i <$length_img; $i++) { 

	   	// 	$html_img[$i] = file_get_html($url_img[$i]);
	   	// 	$img[$i] = $html_img[$i]->find('.left-content img');
	   	// 	foreach ($img[$i] as $value) {
	   	// 		$img_arr[$j]= $value->src;
	   	// 		$j++;
	   	// 	}
	   	// }
	   	//lay ra excel
		   $fileType = 'Excel2007';
	// Tên file cần ghi
		$fileName = 'tuvan_import123.xlsx';
		$objPHPExcel = PHPExcel_IOFactory::load("tuvan_import123.xlsx");
		$objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', "ID")
                            ->setCellValue('B1', "TenBenh")
                            ->setCellValue('C1', "TuVan");
         $j=2;
         for ($i=0; $i <$c ; $i++) { 
        
	         foreach ($arr[$i] as $key=>$value) {
	         	$objPHPExcel->setActiveSheetIndex(0)
									->setCellValue("A$j", "$i")
									->setCellValue("B$j", $value['title'])
		                            ->setCellValue("C$j", $value['content']);
				$j++;
	         }
	         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
			// Tiến hành ghi file
			$objWriter->save($fileName);
			
	}

	   
	   
	 ?>
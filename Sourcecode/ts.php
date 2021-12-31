if(mysqli_num_rows($kq)>0) {
							while($data=mysqli_fetch_assoc($kq)) {
								$select = 'SELECT transactions.transaction_id,transactions.status,user_id,order_id,product.product_id,name,image_link,image_name,price,orders.soluong
									FROM transactions,orders,product 
									WHERE transactions.transaction_id=orders.transaction_id 
									AND orders.product_id=product.product_id 
									and user_id = "'.$data['user_id'].'"
									AND transactions.status = 0 
									';
								$result= mysqli_query($con,$select);
								//var_dump($select);exit;
								if (mysqli_num_rows($result)>0) {
									while($row=mysqli_fetch_assoc($result)) {
										$id_product=$row['product_id'];
										$sl='';
										if(isset($id_product)) {
											
										}
									
										$id_tran= $row['transaction_id'];
										$sl=$row['soluong'];
										echo '
										<tr>
											<td style="font-weight: bold; padding-left: 30px;">'.$row['name'].'</td>
											<th>'.$row['price'].' VNĐ</th>
											<th>'.$row['soluong'].'</th>
											<th>
												<a href="detail.php?id='.$row['product_id'].'">
													<img style="border:#888 1px solid;" src="'.$row['image_link'].'" alt="'.$row['image_name'].'" height="100px" width="150px"/>
												</a>
											</th>
											<th>
												<a onclick="return ConfirmDelete();" href="delete_cart.php?id='.$row['order_id'].'">
													<input type="button" style="border-radius:5px; padding:5px 15px; border-color:#888; background-color:#888; color:white; font-weight: bold;" value="BỎ"/>
												</a>
											</th>
										</tr>';
									}
									$select2='SELECT SUM(price) AS amount
									FROM transactions,orders,product 
									WHERE transactions.transaction_id=orders.transaction_id 
									AND orders.product_id=product.product_id 
									AND user_id = "'.$data['user_id'].'"
									AND transactions.status = 0 ';
									$result2=mysqli_query($con,$select2);
									if(mysqli_num_rows($result2)>0) {
										while ($row2=mysqli_fetch_assoc($result2)) {
											$amount= $row2['amount']*$sl;
											$update_price='update transactions set amount = "'.$amount.'" where transaction_id = "'.$id_tran.'"';
											$update_insert=mysqli_query($con,$update_price);
										}
									}
									echo '
									<tr>
										<th>Tổng giá:</th>
										<th colspan="2">'.$amount.' VNĐ</th>
										<th>
											<a onclick="return ConfirmPay();" href="pay.php?id='.$id_tran.'">
												<input type="button" style="border-radius:5px; padding:5px 15px; background-color:#ff5200b8; font-weight: bold; color:white;" value="ĐẶT HÀNG"/>
											</a>
										</th>
									</tr>
									';
								}
							}
						}
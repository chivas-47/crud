  class  là  cái để  tạo  ra  nhiều object  có  cùng thuộc  tính và tính chất của class đó 
   in  php  $this  chỉ  được   sài  rong  class ;
  object ơcợc tạo  ra từ class và  mang  những  đặc  tính của  class
##  class in php
  class  classname{

  }
  * object được  tạo  ra từ   class
  vd: object= new object;
    - thuộc  tính (propertice)
    - biến được  khai  báo trong  class và có kèm theo cơ chế( nó là  quy  định phạm  vi truy  cập  của  thuộc  tính)-> public , private, protected
    + thuộc tính public  có thể   truy  cập   từ  mọi nơi bên trong  class  và  bên ngoài class và các class con 
    + thuộc tính  private chỉ có thể  truy  cập  từ bên trong  class đó  class con  và  các class khác không thể  truy  cập  private
    + protected có thể  truy cập  từ  class con và các class khác  ngoài  không thể  truy  cập 
  * phương thức là  hàm  được khái báo có kèm teo  cơ chế 
   -  create delete get  set 
  *  trong  1 class có rất  nhiều phương thức và    function -> sẽ  có nhiều  phương  thức  reaturn  chả   về và và không chả về -> như  set thì không cần và  get thì cần   
  *  làm thế nào  để  chúng ta  truy  cập  vào  1 thuộc  tính  hoặc phương thức  trong  class
  
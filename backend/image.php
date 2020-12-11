
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$tstr[$do];?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%"><?=$tstr[$do];?></td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                    $all=$News->count();
                    $div=3;
                    $pages=ceil($all/$div);
                    $now=(isset($_GET['p']))?$_GET['p']:1;
                    // $now=(isset($_GET['p']))??1;
                    $start=($now-1)*$div;
                $rows=$Image->all(" limit $start,$div");

                foreach($rows as $row){
                ?>
                <tr>
                    <td class="cent" width="70%"><img src="./img/<?=$row['img'];?>" style="width:100px;height:68px"></td>
                    <td width="10%"><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                    <td width="10%"><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                    <td><input type="button" value="更換圖片" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')"></td>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <div style="text-align:center;">
    <?php
    if(($now-1)>0){

        ?>
        <a class="bl" style="font-size:30px;" href="?do=image&p=<?=$now-1;?>">&lt;&nbsp;</a>
        <?php
    }
    ?>
        <?php
        for ($i=1; $i <=$pages ; $i++) {
            
            if ($now==$i) {
                $font="40px";
            }
            else{
                $font="30px";

            }
                echo "<a href='?do=image&p=$i' style='font-size:$font'>";
                echo $i;
                echo "</a>";
        }


        ?>
        <?php
        if ($now+1<=$pages) {
            ?>
        <a class="bl" style="font-size:30px;" href="?do=image&p=<?=$now+1;?>">&nbsp;&gt;</a>
        <?php
    }
    ?>
    </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px"><input type="button"
                            onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')"
                            value="<?=$addstr[$do];?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$tstr[$do];?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">最新消息資料內容</td>
                    <td width="15%">顯示</td>
                    <td width="15%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows=$News->all();

                foreach($rows as $row){
                ?>
                <tr>
                    <td >
                    <textarea name="text[]" id="" style="width: 95%;height:50px"><?=$row['text'];?></textarea>
                </td>
                    <td width="15%"><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                    <td width="15%"><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
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
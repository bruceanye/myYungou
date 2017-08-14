<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript" src="<?php echo C('AD_JS');?>jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo C('AD_JS');?>layer.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品类型列表</title>
    <style type="text/css">
        <!--
        body {
            margin-left: 3px;
            margin-top: 0px;
            margin-right: 3px;
            margin-bottom: 0px;
        }
        .STYLE1 {
            color: #e1e2e3;
            font-size: 12px;
        }
        .STYLE6 {color: #000000; font-size: 12; }
        .STYLE10 {color: #000000; font-size: 12px; }
        .STYLE19 {
            color: #344b50;
            font-size: 12px;
        }
        .STYLE21 {
            font-size: 12px;
            color: #3b6375;
        }
        .STYLE22 {
            font-size: 12px;
            color: #295568;
        }
        a:link{
            color:#e1e2e3; text-decoration:none;
        }
        a:visited{
            color:#e1e2e3; text-decoration:none;
        }
        -->
    </style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="6%" height="19" valign="bottom"><div align="center"><img src="/Public/resources/admin/images/tb.gif" width="14" height="14" /></div></td>
                                <td width="94%" valign="bottom"><span class="STYLE1"> 商品管理 -> 类型列表</span></td>
                            </tr>
                        </table></td>
                        <td><div align="right"><span class="STYLE1">
              <a href="<?php echo U('addType');?>"><img src="/Public/resources/admin/images/add.gif" width="10" height="10" /> 添加类型</a>   &nbsp;
              </span>
                            <span class="STYLE1"> &nbsp;</span></div></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
            </td>
            <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">序号</span></div></td>
            <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">类型ID</span></div></td>
            <td width="30%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">类型名称</span></div></td>
            <td width="20%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">操作</span></div></td>
            </tr>
            <?php if(is_array($Info["typeInfo"])): foreach($Info["typeInfo"] as $k=>$type): ?><tr>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                        <div align="center"><span class="STYLE19" id="id"><?php echo ($k+1); ?></span></div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE6">
                        <div align="center"><span class="STYLE19" id="id"><?php echo ($type["type_id"]); ?></span></div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($type["type_name"]); ?></div>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">
                        <div align="center" class="STYLE21">
                            <a href="<?php echo U('Attribute/showlist',[type_id=>$type['type_id']]);?>" style="color:#000;">  类型属性  |
                                <a style="color:#000;" class="delType"> 删除</a>
                                | <a href="<?php echo U('updType',[type_id=>$type['type_id']]);?>" style="color:#000;" class="updBtn">修改</a></div>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table></td>
    </tr>
    <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="33%">
                    <div align="left">
                        <span class="STYLE22">&nbsp;&nbsp;&nbsp;&nbsp;共有<strong><?php echo ($Info['page']->totalRows); ?></strong> 条记录，当前第
                            <strong> <?php echo ($Info['page']->nowPage); ?></strong> 页，共
                            <strong><?php echo ($Info['page']->totalPages); ?></strong> 页
                        </span>
                    </div>
                </td>
                <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                        <?php echo ($Info["show"]); ?>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
</table>
</body>
<script type="text/javascript">
    $(function () {
//    function delRole(obj) {
//      console.log(obj);
        $('.delType').click(function () {
            var typeId = $(this).parent().parent().parent().find("td:eq(1):first span").html();
            layer.confirm('确定要删除该类型吗？', {
                btn: ['确定删除','容我想想'] //按钮
            }, function(){
                $.ajax({
                    url:"<?php echo U('delType');?>",
                    data:{'typeId':typeId},
                    dataType:'json',
                    type:'post',
                    success:function (msg) {
                        if(msg.status == 200){
                            layer.msg('删除成功');
                            //location.reload();
                        }else if(msg.status == 202){
                            layer.msg('删除失败');
                        }
                    }
                })

            }, function(){
                layer.msg( {
                    time: 1000,
                });
            });
        })
    })
</script>
</html>
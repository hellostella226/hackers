<script type="text/javascript">
    $(document).ready(function(){
        //main_slider_applyclass
        var bnrWrap = $('.slider-applyclass')
        var bnr_slider = bnrWrap.find('.bxslider');

        slider = bnr_slider.bxSlider({
            auto: true,
            mode : 'fade',
            cutLimit: 4,
            speed: 500,
            autoStart:true,
            pagerCustom: '#bx-pager-apply',
            onSliderLoad: function(selector){
                bnrWrap.css("overflow","visible");
            }
        });
        $('.page-applyclass').mouseover(function(){
            slider.startAuto();
        });
    });
</script>

<div id="footer" class="footer">
    <div class="inner p-r">
        <img src="http://img.hackershrd.com/common/logo_footer.png" class="logo-footer" alt="��Ŀ�� HRD LOGO" width="165" height="37"/>
        <div class="site-info">
            <div class="link-box">
                <a href="#">��Ŀ�� �Ұ�</a>
                <a href="#">�̿���</a>
                <a href="#"><strong class="tc-brand">����������޹�ħ</strong></a>
                <a href="#">CONTACT US</a>
                <a href="#">���/��������</a>
            </div>
            <div class="address">
                ��è�����͵� | ����ڵ�Ϲ�ȣ [120-87-09984] | TEL : 02)537-5000<br />
                ����Ư���� ���ʱ� �������61�� 23(���ʵ� 1316-15) ���뼺����� 203ȣ<br />
                ��ǥ�̻� : ������ | ������������å���� : �躴ö<br />
                ����Ǹž��Ű�(�� 2008-���Ｍ��-0396ȣ) ������ȸ �ΰ���Ż���Ű�(�Ű���ȣ : 013760)<br />
            </div>
        </div>
        <a href="javascript:void(window.open('https://pgweb.uplus.co.kr/pg/wmp/mertadmin/jsp/mertservice/s_escrowYn.jsp?mertid=champescrow','','scrollbars=no,width=340,height=262,top=150,left=550'))" class="lg-info"><img src="http://img.hackershrd.com/common/lg_info.gif" alt="�������� �����ŷ��� ���� ����(����)�� ���Ե� ��ǰ�� ������ �Ա����� �����Ͻô� ��� è�����͵� ������ LG U+�� ���ž��� ���񽺸� �̿��Ͻ� �� �ֽ��ϴ�.* LG U+�� ������ݿ�ġ�� ��Ϲ�ȣ : 02-006-00001" width="163" height="114"/></a>
    </div>
</div>
</div>
</body>
</html>
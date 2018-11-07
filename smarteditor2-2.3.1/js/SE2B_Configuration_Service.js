/*
 * Smart Editor 2 Configuration : This setting must be changed by service
 */
window.nhn = window.nhn || {};
nhn.husky = nhn.husky || {};
nhn.husky.SE2M_Configuration = nhn.husky.SE2M_Configuration || {};

/**
 * ����Ʈ������2���� �����ϴ� JS, IMG ���丮
 */
nhn.husky.SE2M_Configuration.Editor = {
	sJsBaseURL : './js_src',
	sImageBaseURL : './img/'
};

/**
 * JS LazyLoad�� ���� ���
 */
nhn.husky.SE2M_Configuration.LazyLoad = {
	sJsBaseURI : "js_lazyload"
};

/**
 * CSS LazyLoad�� ���� ���
 */
nhn.husky.SE2M_Configuration.SE2B_CSSLoader = {
	sCSSBaseURI : "css"
};

/**
 * �������� ����
 */
nhn.husky.SE2M_Configuration.SE_EditingAreaManager = {
	sCSSBaseURI : "css",
	sBlankPageURL : "smart_editor2_inputarea.html",
	sBlankPageURL_EmulateIE7 : "smart_editor2_inputarea_ie8.html",
	aAddtionalEmulateIE7 : [] // IE8 default ���, IE9 ~ ������ ���
};

/**
 * ����Ʈ������2���� ����ϴ� ������ ����
 * http://wiki.nhncorp.com/pages/viewpage.action?pageId=74253685
 */
nhn.husky.SE2M_Configuration.LinkageDomain = {
	sCommonAPI : 'http://api.se2.naver.com',
	sCommonStatic : 'http://static.se2.naver.com',
	sCommonImage : 'http://images.se2.naver.com'
};


/**
 * [�����ټ�]
 * ����Ű ALT+,  ALT+. �� �̿��Ͽ� ����Ʈ������ ������ ����/���� ��ҷ� �̵��� �� �ִ�.
 * 		sBeforeElementId : ����Ʈ������ ���� ���� ����� id
 * 		sNextElementId : ����Ʈ������ ���� ���� ����� id 
 * 
 * ����Ʈ������ ���� �̿��� ���� ���� (��:����Ʈ�����Ͱ� ����� ��α� ���� ������������ ���� ����) �� �ش��ϴ� ������Ʈ���� TabŰ�� ������ ������ �������� ��Ŀ���� �̵���ų �� �ִ�.
 * 		sTitleElementId : ���� �ش��ϴ� input ����� id. 
 */
nhn.husky.SE2M_Configuration.SE2M_Accessibility = {
    sBeforeElementId : '',
    sNextElementId : '',
    sTitleElementId : ''
};
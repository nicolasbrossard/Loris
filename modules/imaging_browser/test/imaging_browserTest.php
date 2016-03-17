<?php
/**
 * Imaging Browser automated integration tests
 *
 * PHP Version 5
 *
 * @category Test
 * @package  Loris
 * @author   Ted Strauss <ted.strauss@mcgill.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @link     https://github.com/aces/Loris
 */
require_once __DIR__
    . "/../../../test/integrationtests/LorisIntegrationTest.class.inc";

/**
 * Imaging Browser automated integration tests
 *
 * PHP Version 5
 *
 * @category Test
 * @package  Loris
 * @author   Ted Strauss <ted.strauss@mcgill.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @link     https://github.com/aces/Loris
 */
class ImagingBrowserTestIntegrationTest extends LorisIntegrationTest
{

    /**
     * Does basic setting up of Loris variables for this test, such as
     * instantiting the config and database objects, creating a user
     * to user for the tests, and logging in, and creating a candidate
     * with a session
     *
     * @return none
     */
    public function setUp()
    {

        parent::setUp();

        // Create tests-specific data
        $this->DB->insert(
            "psc",
            array(
             'CenterID'  => '253',
             'Name'      => 'Test Site AOL',
             'Alias'     => 'AOL',
             'MRI_alias' => 'Y',
            )
        );

        $this->DB->insert(
            "psc",
            array(
             'CenterID'  => '254',
             'Name'      => 'Test Site BOL',
             'Alias'     => 'BOL',
             'MRI_alias' => 'Y',
            )
        );

        // Create test-specific data
        $this->DB->insert(
            "candidate",
            array(
             'CandID'      => '000001',
             'PSCID'       => 'DCC0001',
             'CenterID'    => 1,
             'Active'      => 'Y',
             'Entity_type' => 'Human',
            )
        );

        $this->DB->insert(
            "candidate",
            array(
             'CandID'      => '000002',
             'PSCID'       => 'AOL0002',
             'CenterID'    => 253,
             'Active'      => 'Y',
             'Entity_type' => 'Human',
            )
        );

        $this->DB->insert(
            "candidate",
            array(
             'CandID'      => 000003,
             'PSCID'       => 'BOL0003',
             'CenterID'    => 254,
             'Active'      => 'Y',
             'Entity_type' => 'Human',
            )
        );

        $this->DB->insert(
            'session',
            array(
             'ID'            => 999997,
             'CandID'        => 000001,
             'Visit_label'   => 'Test0',
             'CenterID'      => 1,
             'Scan_done'     => 'Y',
             'Current_stage' => 'Visit',
             'Visit'         => 'In Progress',
            )
        );

        $this->DB->insert(
            'session',
            array(
             'ID'            => 999998,
             'CandID'        => 000002,
             'Visit_label'   => 'Test1',
             'CenterID'      => 253,
             'Scan_done'     => 'Y',
             'Current_stage' => 'Visit',
             'Visit'         => 'In Progress',
            )
        );

        $this->DB->insert(
            'session',
            array(
             'ID'            => 999999,
             'CandID'        => 000003,
             'Visit_label'   => 'Test2',
             'CenterID'      => 254,
             'Scan_done'     => 'Y',
             'Current_stage' => 'Visit',
             'Visit'         => 'In Progress',
            )
        );

        // Add imaging data

        $this->DB->insert(
            'mri_processing_protocol',
            array(
             'ProcessProtocolID' => 1,
             'ProtocolFile'      => 'None1',
             'FileType'          => null,
             'Tool'              => 'None1',
             'InsertTime'        => 0,
             'md5sum'            => null,
            )
        );

        $this->DB->insert(
            'mri_processing_protocol',
            array(
             'ProcessProtocolID' => 2,
             'ProtocolFile'      => 'None2',
             'FileType'          => null,
             'Tool'              => 'None2',
             'InsertTime'        => 0,
             'md5sum'            => null,
            )
        );

        // @codingStandardsIgnoreStart
        $this->DB->insert(
            'files',
            array(
             'FileID'                => 1,
             'SessionID'             => 999998,
             'File'                  => 'assembly/506145/V1/mri/native/' .
              'loris-MRI_506145_V1_t2_001.mnc',
             'SeriesUID'             => '1.3.12.2.1107.5.2.32.35049.' .
               '2014021711090977356751313.0.0.0',
             'EchoTime'              => 0.011,
             'CoordinateSpace'       => 'native',
             'OutputType'            => 'native',
             'AcquisitionProtocolID' => 45,
             'FileType'              => 'mnc',
             'PendingStaging'        => 0,
             'InsertedByUserID'      => 'lorisadmin',
             'InsertTime'            => 1454951768,
             'SourcePipeline'        => null,
             'PipelineDate'          => null,
             'SourceFileID'          => 1,
             'ProcessProtocolID'     => 1,
             'Caveat'                => 0,
             'TarchiveSource'        => 263,
            )
        );
        // @codingStandardsIgnoreEnd

        // @codingStandardsIgnoreStart
        $this->DB->insert(
            'files',
            array(
             'FileID'                => 2,
             'SessionID'             => 999999,
             'File'                  => 'assembly/506145/V1/mri/native/' .
               'loris-MRI_506145_V1_t1_001.mnc',
             'SeriesUID'             => '1.3.12.2.1107.5.2.32.35049.' .
               '2014021711090977356751313.0.0.0',
             'EchoTime'              => 0.011,
             'CoordinateSpace'       => 'native',
             'OutputType'            => 'native',
             'AcquisitionProtocolID' => 44,
             'FileType'              => 'mnc',
             'PendingStaging'        => 0,
             'InsertedByUserID'      => 'lorisadmin',
             'InsertTime'            => 1454951768,
             'SourcePipeline'        => null,
             'PipelineDate'          => null,
             'SourceFileID'          => 2,
             'ProcessProtocolID'     => 2,
             'Caveat'                => 0,
             'TarchiveSource'        => 263,
            )
        );
        // @codingStandardsIgnoreStart

        $this->DB->insert(
            'parameter_type',
            array(
             'ParameterTypeID' => 1000,
             'Name'            => 'Selected',
             'Type'            => null,
             'Description'     => null,
             'RangeMin'        => null,
             'RangeMax'        => null,
             'SourceField'     => null,
             'SourceFrom'      => null,
             'SourceCondition' => null,
             'CurrentGUITable' => 'AnyTextToDeleteThisEntry',
             'Queryable'       => 1,
             'IsFile'          => 0,
            )
        );
        $this->DB->insert(
            'parameter_file',
            array(
             'ParameterFileID' => 10,
             'FileID'          => 1,
             'ParameterTypeID' => 1000,
             'Value'           => 't2',
             'InsertTime'      => 0,
            )
        );

        $this->DB->insert(
            'parameter_file',
            array(
             'ParameterFileID' => 11,
             'FileID'          => 2,
             'ParameterTypeID' => 1000,
             'Value'           => 't1',
             'InsertTime'      => 0,
            )
        );

        $this->DB->insert(
            'mri_acquisition_dates',
            array(
             'SessionID'       => 999998,
             'AcquisitionDate' => '2014-02-17',
            )
        );

        $this->DB->insert(
            'mri_acquisition_dates',
            array(
             'SessionID'       => 999999,
             'AcquisitionDate' => '2014-02-17',
            )
        );

        $this->DB->insert(
            'files_qcstatus',
            array(
             'FileQCID'          => 1,
             'FileID'            => 1,
             'SeriesUID'         => '1.3.12.2.1107.5.2.32.35049.' .
               '2014021711090977356751313.0.0.0',
             'EchoTime'          => 0.011,
             'QCStatus'          => null,
             'QCFirstChangeTime' => 1455040145,
             'QCLastChangeTime'  => 1455040145,
            )
        );

        $this->DB->insert(
            'files_qcstatus',
            array(
             'FileQCID'          => 2,
             'FileID'            => 2,
             'SeriesUID'         => '1.3.12.2.1107.5.2.32.35049.' .
               '2014021711090977356751313.0.0.0',
             'EchoTime'          => 0.011,
             'QCStatus'          => null,
             'QCFirstChangeTime' => 1455040145,
             'QCLastChangeTime'  => 1455040145,
            )
        );

    }

    /**
     * Tears down created dataset
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        // tear down test-specific dataset
        $this->DB->run('SET foreign_key_checks =0');
        $this->DB->delete("files", array('FileID' => '1'));
        $this->DB->delete("files", array('FileID' => '2'));
        $this->DB->delete(
            "mri_processing_protocol",
            array('ProcessProtocolID' => '1')
        );
        $this->DB->delete(
            "mri_processing_protocol",
            array('ProcessProtocolID' => '2')
        );
        $this->DB->delete("parameter_file", array('ParameterFileID' => '10'));
        $this->DB->delete("parameter_file", array('ParameterFileID' => '11'));
        $this->DB->delete(
            "parameter_type",
            array('CurrentGUITable' => 'AnyTextToDeleteThisEntry')
        );
        $this->DB->delete("mri_acquisition_dates", array('SessionID' => '999998'));
        $this->DB->delete("mri_acquisition_dates", array('SessionID' => '999999'));
        $this->DB->delete("files_qcstatus", array('FileID' => '1'));
        $this->DB->delete("files_qcstatus", array('FileID' => '2'));
        $this->DB->delete("session", array('ID' => '999997'));
        $this->DB->delete("session", array('ID' => '999998'));
        $this->DB->delete("session", array('ID' => '999999'));
        $this->DB->delete("candidate", array('CandID' => '000001'));
        $this->DB->delete("candidate", array('CandID' => '000002'));
        $this->DB->delete("candidate", array('CandID' => '000003'));
        $this->DB->delete("psc", array('CenterID' => '253'));
        $this->DB->delete("psc", array('CenterID' => '254'));
        $this->DB->run('SET foreign_key_checks =1');

    }

    /**
     * Tests that, when loading the imaging_browser module, some
     * text appears in the body.
     *
     * @return void
     */
    function testImagingBrowserDoespageLoad()
    {
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $breadcrumbText = $this->webDriver->findElement(
            WebDriverBy::cssSelector("body")
        )->getText();
        $this->assertContains("Imaging Browser", $breadcrumbText);
    }

    /******** A ********/

    /**
     * Step 1
     * Tests that the imaging_browser module loads with "view_site"
     * and "view_allsites" permissions
     *
     * @return void
     */
    function testImagingBrowserDoespageLoadPermissions()
    {
        // Without permissions
        $this->setupPermissions(array(''));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $errorText = $this->webDriver->findElement(
            WebDriverBy::cssSelector("body")
        )->getText();
        $this->assertContains(
            "You do not have access to this page.",
            $errorText
        );

        // With permission imaging_browser_view_site
        $this->setupPermissions(array('imaging_browser_view_site'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $breadcrumbText = $this->webDriver->findElement(
            WebDriverBy::cssSelector("body")
        )->getText();
        $this->assertContains("Imaging Browser", $breadcrumbText);

        // With permission imaging_browser_view_allsites
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $breadcrumbText = $this->webDriver->findElement(
            WebDriverBy::cssSelector("body")
        )->getText();
        $this->assertContains("Imaging Browser", $breadcrumbText);
    }

    /**
     * Step 2
     * Tests that users can see only own site datasets if permission
     * is "view_onsite" and all data sets if "view_allsites" permissions
     *
     * @return void
    */
    function testImagingBrowserViewDatasetDependingOnPermissions()
    {
        // With permission imaging_browser_view_site: 0 subjects found from DCC site
        $this->setupPermissions(array('imaging_browser_view_site'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $ControlPanelText = $this->webDriver->findElement(
            WebDriverBy::cssSelector(".controlPanelSection")
        )->getText();
        $this->assertContains("0 subject timepoint(s) selected", $ControlPanelText);

        // With permission imaging_browser_view_allsites:
        // 2 subjects with imaging data found
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $ControlPanelText = $this->webDriver->findElement(
            WebDriverBy::cssSelector(".controlPanelSection")
        )->getText();
        $this->assertContains("2 subject timepoint(s) selected", $ControlPanelText);
    }

    /**
     * Step 3a & 4 combined
     * Tests that Filters (tested for PSCID here)
     * and that Show Data and Clear Form work
     *
     * @return void
    */
    function testImagingBrowserFiltersAndShowClearButtons()
    {
        // Testing for PSCID
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $PSCIDOptions = $this->webDriver->findElement(
            WebDriverBy::Name("pscid")
        );
        $PSCIDOptions ->sendKeys("AOL");

        $ShowData = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                "div.col-sm-2:nth-child(3) > input:nth-child(1)"
            )
        );
        $ShowData->click();

        $ControlPanelText = $this->webDriver->findElement(
            WebDriverBy::cssSelector(".controlPanelSection")
        )->getText();
        $this->assertContains("1 subject timepoint(s) selected", $ControlPanelText);

        // Now reset using clear button and confirm site
        // set back to all and 2 subjects found
        $ClearForm = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                "div.col-sm-2:nth-child(4) > input:nth-child(1)"
            )
        );
        $ClearForm->click();

        $PSCIDCleared = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                "div.row:nth-child(1) > div:nth-child(1) > " .
                "div:nth-child(2) > input:nth-child(1)"
            )
        )->getText();
        $this->assertEquals("", $PSCIDCleared);

        $ShowData = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                "div.col-sm-2:nth-child(3) > input:nth-child(1)"
            )
        );
        $ShowData->click();

        $ControlPanelText = $this->webDriver->findElement(
            WebDriverBy::cssSelector(".controlPanelSection")
        )->getText();
        $this->assertContains("2 subject timepoint(s) selected", $ControlPanelText);
    }

    /**
     * Step 3b
     * Tests that the Site field is populate with own site if permission
     * is "view_onsite" and "All" if "view_allsites" permissions
     *
     * @return void
     */
    function testImagingBrowserSiteDependingOnPermissions()
    {
        // With permission imaging_browser_view_site
        $this->setupPermissions(array('imaging_browser_view_site'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );
        $SiteTopMenuTextAll = $this->webDriver->findElement(
            WebDriverBy::cssSelector(".navbar-text")
        )->getText();
        $SiteTopMenuText    = explode(":", $SiteTopMenuTextAll);

        $SiteFilterText = $this->webDriver->findElement(
            WebDriverBy::Name("SiteID")
        )->getText();
        $this->assertEquals(trim($SiteTopMenuText[1]), $SiteFilterText);

        // With permission imaging_browser_view_allsites
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $SiteTopMenuTextAll = $this->webDriver->findElement(
            WebDriverBy::cssSelector(".navbar-text")
        )->getText();
        $SiteFilterText     = $this->webDriver->findElement(
            WebDriverBy::Name("SiteID")
        )->getText();
        $this->assertContains("All", $SiteFilterText);
    }

    /**
     * Step 5
     * Tests that column headers are sortable: Will check PSCID only
     *
     * @return void
     */
    function testImagingBrowserSortableByTableHeader()
    {
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $PSCIDHeader = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".info > th:nth-child(3) > a:nth-child(1)"
            )
        );
        $this->clickToLoadNewPage($PSCIDHeader);

        $FirstEntry = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".table > tbody:nth-child(2) > tr:nth-child(1) > td:nth-child(3)"
            )
        )->getText();
        $this->assertContains("AOL0002", $FirstEntry);

        // click again and make sure the order is now reversed
        $PSCIDHeader = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".info > th:nth-child(3) > a:nth-child(1)"
            )
        );
        $this->clickToLoadNewPage($PSCIDHeader);

        $FirstEntry = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".table > tbody:nth-child(2) > tr:nth-child(1) > td:nth-child(3)"
            )
        )->getText();
        $this->assertContains("BOL0003", $FirstEntry);
    }

    /**
     * Step 6
     * Tests that links to native work
     *
     * @return void
    */
    function testViewSessionLinksNative()
    {
        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $NativeLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[12]/a'
            )
        );
        $this->clickToLoadNewPage($NativeLink);

        $bodyText = $this->webDriver->findElement(
            WebDriverBy::cssSelector("body")
        )->getText();
        $this->assertContains("View Session", $bodyText);

        // Selected link tested in the next test
    }

    /******** B ********/

    /**
     * Steps 1 & 2
     * Tests that the links on the sidebar work
     * in 3 functions for the 3 headers: Navigation, Links, VolumeViewer
     *
     * @return void
     */
    function testViewSessionNavigation()
    {
        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $w = new WebDriverWindow($this->webDriver);
        $w->maximize();

        $this->webDriver->navigate()->refresh();

        // Go to first item in the imaging browser list of candidates
        // to view buttons: Back to List and Next, then we can check Prev

        //Back to List Button
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $this->safeClick(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );

        $this->safeClick(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/ul[1]/li[1]/a/span/span')
        );

        $SelectionFilter = $this->safeFindElement(
            WebDriverBy::xPath('//*[@id="lorisworkspace"]/div[1]/div/div/div[1]')
        )->getText();
        $this->assertContains("Selection Filter", $SelectionFilter);

        //Next Button
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $this->safeClick(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[12]/a'
            )
        );

        $this->safeClick(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/ul[1]/li[2]/a/span/span')
        );

        $SiteText2 = $this->safeFindElement(
            WebDriverBy::xPath('//*[@id="table-header-left"]/tbody/tr/td[5]')
        )->getText();
        $this->assertContains("Test Site BOL", $SiteText2);

        //Previous Button
        $this->safeClick(
            WebDriverBy::xPath(
                '//*[@id="sidebar-content"]/ul[1]/li[2]/a[1]/span/span'
            )
        );

        $SiteText1 = $this->safeFindElement(
            WebDriverBy::xPath('//*[@id="table-header-left"]/tbody/tr/td[5]')
        )->getText();
        $this->assertContains("Test Site AOL", $SiteText1);
    }

    /**
     * Tests the links under "Links"
     *
     * @return void
     */
    function testViewSessionLinks()
    {
        $this->markTestIncomplete(
            'Forms should be added, & router.php should be fixed for instruments'
        );

        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $SelectedLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );
        $this->clickToLoadNewPage($SelectedLink);

        //MRI Parameter form
        $MRIParamForm = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/ul[2]/li[1]/a')
        );
        $MRIParamForm->click();

        $MRIFormHeader = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/ul[2]/li[1]/a')
        )->getText();
        // IF NO FORM PRESENT, ALLOW SECOND ASSERTION
        //$this->assertContains("MRI Parameter Form", $MRIFormHeader);
        $this->assertContains(
            "This page (mri_parameter_form) is under construction",
            $MRIFormHeader
        );

        //Radiology review form
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $SelectedLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );
        $this->clickToLoadNewPage($SelectedLink);

        $RadiologyForm = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/ul[2]/li[2]/a')
        );
        $RadiologyForm->click();

        $RadFormHeader = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="test_form"]/div/div[1]/div/h3')
        )->getText();
        //$this->assertContains("Radiology Review Form", $RadFormHeader);
        $this->assertContains(
            "This page (radiology_review) is under construction",
            $RadFormHeader
        );
    }

    /**
     * Tests that Volume Viewer buttons work
     *
     * @return void
     */
    function testViewSessionVolumeViewer()
    {
        $this->markTestSkipped(
            'Currently awaiting redmine 9385'
        );
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $SelectedLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );
        $this->clickToLoadNewPage($SelectedLink);

        $ImageCheckbox = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="image-1"]/div/div/div[1]/input')
        );
        $ImageCheckbox->click();

        $ThreeDOnly = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="bbonly"]')
        );
        $ThreeDOnly->click();

        $BreadCrumbText = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="page"]/div/div[1]/a/label')
        )->getText();
        $this->assertContains("Brainbrowser", $BreadCrumbText);
    }

    /**
     * Steps 3 through 7
     * Visit level feedback
     *
     * @return void
    */
    function testViewSessionVisitLevelFeedback()
    {
        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $NativeLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[12]/a'
            )
        );
        $this->clickToLoadNewPage($NativeLink);

        $VisitLevelFeedback = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/div[1]/a/span/span[2]')
        );
        $handleList         = $this->webDriver->getWindowHandles();
        $VisitLevelFeedback->click();

        $this->markTestSkipped(
            'Popup window can not be tested'
        );

        $newHandleList = $this->webDriver->getWindowHandles();
        $diff          = array_diff($newHandleList, $handleList);
        $this->assertCount(1, $diff);
        $this->webDriver->switchTo()->window($diff[1]);

        $NewWindowPopUpPSCID = $this->webDriver->findElement(
            WebDriverBy::xPath('/html/body/div/table/tbody/tr[2]/td')
        )->getText();
        $this->assertContains("AOL0002", $NewWindowPopUpPSCID);
        $this->webDriver->switchTo()->window($diff[1])->close();
        $this->webDriver->switchTo()->window($handleList[0]);

        // Check that the QC status -VISIT LEVEL- buttons
        // are viewable without _qc permission
        $QCStatusVisit = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/div[2]/div/label')
        )->getText();
        $this->assertContains("QC Status", $QCStatusVisit);

        $QCPending = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/div[2]/label')
        )->getText();
        $this->assertContains("QC Pending", $QCPending);

        // Check that the QC -VISIT LEVEL- options are viewable
        // with correct permission
        $this->setupPermissions(
            array(
             'imaging_browser_view_allsites',
             'imaging_browser_qc',
            )
        );
        $this->webDriver->navigate()->refresh();

        $QCStatusVisitPass = $this->webDriver->findElement(
            WebDriverBy::Name("visit_status")
        )->getText();
        $this->assertContains("Pass", $QCStatusVisitPass);

        $QCPendingNo = $this->webDriver->findElement(
            WebDriverBy::Name("visit_pending")
        )->getText();
        $this->assertContains("No", $QCPendingNo);

        // Test that we can edit the QC status -VISIT LEVEL-
        // with the correct permission
        // Change visit QC status from Blank to Pass
        // Simultaneously also testing that the Save button shows and works

        $QCStatusVisitSetFail = $this->webDriver->findElement(
            WebDriverBy::Name("visit_status")
        )->sendKeys("Fail");

        // Testing the button Save is viewable, clickable and works
        $QCSaveShow = $this->webDriver->findElement(
            WebDriverBy::xPath('//input[@accessKey="s"]')
        );
        $QCSaveShow->click();

        $QCStatusVisit = $this->webDriver->findElement(
            WebDriverBy::Name("visit_status")
        )->getText();
        $this->assertContains("Fail", $QCStatusVisit);
    }

    /**
     * Step 8
     * Tests Breadcrumb back to imaging browser
     *
     * @return void
    */
    function testViewSessionBreadCrumb()
    {
        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $NativeLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[12]/a'
            )
        );
        $this->clickToLoadNewPage($NativeLink);

        $BreadCrumbLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                "//div[@id='breadcrumbs']
                 /div
                 /div
                 /div
                 /a[2]
                 /div"
            )
        );
        $this->clickToLoadNewPage($BreadCrumbLink);

        $SelectionFilter = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="lorisworkspace"]/div[1]/div/div/div[1]')
        )->getText();
        $this->assertContains("Selection Filter", $SelectionFilter);
    }

    /******** C ********/

    /**
     * Step 1
     * Future feature
     *
     * @return void
    **/

    /**
     * Step 2
     * Scan-Level QC Flags viewable and editabled depending on permission
     *
     * @return void
    */
    function testScanLevelQCFlags()
    {
        $this->markTestSkipped(
            'React components can not be tested'
        );

        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $SelectedLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );
        $this->clickToLoadNewPage($SelectedLink);

        $ImagePanelText1 = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".col-xs-3 > div:nth-child(1) > " .
                "div:nth-child(1) > label:nth-child(1)"
            )
        )->getText();
        $this->assertContains("QC Status", $ImagePanelText1);

        $ImagePanelText2 = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".col-xs-3 > div:nth-child(1) > " .
                "div:nth-child(2) > label:nth-child(1)"
            )
        )->getText();
        $this->assertContains("Selected", $ImagePanelText2);

        $ImagePanelText3 = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".col-xs-3 > div:nth-child(1) > " .
                "div:nth-child(3) > label:nth-child(1)"
            )
        )->getText();
        $this->assertContains("Caveat", $ImagePanelText3);

        // Setting permissions to view all sites and have qc permissions
        $this->setupPermissions(
            array(
             'imaging_browser_view_allsites',
             'imaging_browser_qc',
            )
        );
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );
        $SelectedLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );
        $this->clickToLoadNewPage($SelectedLink);

        // Only with the correct permissions would the options
        // in the dropdown menu appear
        $QCStatusPass = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".col-xs-3 > div:nth-child(1) > " .
                "div:nth-child(1) > select:nth-child(2)"
            )
        )->getText();
        $this->assertContains("Pass", $QCStatusPass);

        $QCSelectedFlair = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".col-xs-3 > div:nth-child(1) > " .
                "div:nth-child(2) > select:nth-child(2)"
            )
        )->getText();
        $this->assertContains("flair", $QCSelectedFlair);

        $QCStatusCaveatTrue = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                "div.row:nth-child(3) > select:nth-child(2) > " .
                "option:nth-child(2)"
            )
        )->getText();
        $this->assertContains("True", $QCStatusCaveatTrue);

        // Test that we can edit the QC status -IMAGE LEVEL-
        // by changing it from Blank to Pass

        // Send option Pass (second option) from dropdown menu,
        // Click save,
        // Check PASS green flag appears next to file name
        $QCStatusImageSetFail = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".col-xs-3 > div:nth-child(1) > div:nth-child(1) > " .
                "select:nth-child(2) > option:nth-child(2)"
            )
        );
        $QCStatusImageSetFail->click();

        $QCSaveShow = $this->webDriver->findElement(
            WebDriverBy::xPath('//input[@accessKey="s"]')
        );
        $QCSaveShow->click();

        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();

        $this->markTestSkipped(
            'React components can not be tested'
        );

        $QCStatusImageCheck = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                "#image-1 > div > div > div.panel-heading > span.label.label-success"
            )
        )->getText();
        $this->assertContains("Fail", $QCStatusImageCheck);

        // Caveat Link only if view all_sites violated scans permissions
        $this->setupPermissions(
            array(
             'imaging_browser_view_allsites',
             'imaging_browser_qc',
             'violated_scans_view_allsites',
            )
        );
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );
        $SelectedLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );
        $this->clickToLoadNewPage($SelectedLink);

        $this->markTestSkipped(
            'React components can not be tested, but also awaiting Redmine 9528'
        );

        $CaveatListLink = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="panel-body-23"]/div[1]/div[2]/div/div[3]/a')
        );
        $CaveatListLink->click();
        $breadcrumbText = $this->webDriver->findElement(
            WebDriverBy::cssSelector("body")
        )->getText();
        $this->assertContains("Mri Violations", $breadcrumbText);
    }

    /**
     * Step 3
     * Selected set to NULL
     *
     * @return void
    **/

    /**
     * Step 4
     * Future Release
     *
     * @return void
    **/

    /**
     * Step 5
     * This is tested in B-Step2 (awaiting redmine 9385)
     *
     * @return void
    **/

    /**
     * Step 6
     * Link to comments launches window
     *
     * @return void
    */
    function testCommentsWindowLaunch()
    {
        $this->markTestSkipped(
            'Popup windows can not be tested'
        );
        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(array('imaging_browser_view_allsites'));
        $this->webDriver->navigate()->refresh();
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );
        $SelectedLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[13]/a'
            )
        );
        $this->clickToLoadNewPage($SelectedLink);

        $CommentsButton = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".mri-second-row-panel > a:nth-child(1) > " .
                "span:nth-child(1) > span:nth-child(2)"
            )
        );
        $handleList     = $this->webDriver->getWindowHandles();
        $CommentsButton->click();

        $newHandleList = $this->webDriver->getWindowHandles();
        $diff          = array_diff($newHandleList, $handleList);
        $this->assertCount(1, $diff);
        $this->webDriver->switchTo()->window($diff[1]);
        $newWindowText = $this->webDriver->findElement(
            WebDriverBy::xPath('//body')
        )->getText();
        $this->assertContains("Click here to close this window", $newWindowText);
        $this->webDriver->switchTo()->window($diff[1])->close();
    }

    /******** D ********/
    /**
     * Link to scan level comments editable with correct permission
     *
     * @return void
    */
    function testVisitCommentsWindowEditable()
    {
        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(
            array(
             'imaging_browser_view_allsites',
             'imaging_browser_qc',
            )
        );
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );
        $NativeLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[12]/a'
            )
        );
        $this->clickToLoadNewPage($NativeLink);

        $VisitLevelFeedback = $this->webDriver->findElement(
            WebDriverBy::xPath('//*[@id="sidebar-content"]/div[1]/a/span/span[2]')
        );
        $handleList         = $this->webDriver->getWindowHandles();
        $VisitLevelFeedback->click();

        $this->markTestSkipped(
            'Popup windows can not be tested'
        );

        $newHandleList = $this->webDriver->getWindowHandles();
        $diff          = array_diff($newHandleList, $handleList);
        $this->assertCount(1, $diff);
        $this->webDriver->switchTo()->window($diff[1]);

        // First clear the field then send the comments/text
        $this->webDriver->findElement(
            WebDriverBy::Name("savecomments[text][7]")
        )->clear();
        $this->webDriver->findElement(
            WebDriverBy::Name("savecomments[text][7]")
        )->sendKeys("Testing comment field within Subject header");

        $SaveButton = $this->webDriver->findElement(
            WebDriverBy::Name("fire_away")
        );
        $SaveButton->click();

        $SubjectText = $this->webDriver->findElement(
            WebDriverBy::Name("savecomments[text][7]")
        )->getText();
        $this->assertEquals(
            "Testing comment field within Subject header",
            $SubjectText
        );

        $this->webDriver->switchTo()->window($diff[1])->close();
    }

    /******** E ********/
    /**
     * Link to visit level comments editable with proper permissions
     *
     * @return void
    */
    function testImageCommentsWindowEditable()
    {
        $this->markTestSkipped(
            'React components can not be tested'
        );
        // Setting permissions to view all sites to view all datasets
        $this->setupPermissions(
            array(
             'imaging_browser_view_allsites',
             'imaging_browser_qc',
            )
        );
        $this->safeGet(
            $this->url . "/imaging_browser/"
        );

        $NativeLink = $this->webDriver->findElement(
            WebDriverBy::xPath(
                '//*[@id="lorisworkspace"]/div[2]/div/div/table/tbody/tr/td[12]/a'
            )
        );
        $this->clickToLoadNewPage($NativeLink);

        $ImageQCFeedback = $this->webDriver->findElement(
            WebDriverBy::cssSelector(
                ".mri-second-row-panel > a:nth-child(1) > " .
                "span:nth-child(1) > span:nth-child(2)"
            )
        );
        $handleList      = $this->webDriver->getWindowHandles();
        $ImageQCFeedback->click();
        $newHandleList = $this->webDriver->getWindowHandles();
        $diff          = array_diff($newHandleList, $handleList);
        $this->assertCount(1, $diff);
        $this->webDriver->switchTo()->window($diff[1]);

        // First clear the field then send the comments/text
        $this->webDriver->findElement(
            WebDriverBy::Name("savecomments[text][1]")
        )->clear();
        $this->webDriver->findElement(
            WebDriverBy::Name("savecomments[text][1]")
        )->sendKeys("Testing comment field within Geometric Intensity");

        $SaveButton = $this->webDriver->findElement(
            WebDriverBy::Name("fire_away")
        );
        $SaveButton->click();

        $GeometricDistortionText = $this->webDriver->findElement(
            WebDriverBy::Name("savecomments[text][1]")
        )->getText();
        $this->assertEquals(
            "Testing comment field within Geometric Intensity",
            $GeometricDistortionText
        );

        $this->webDriver->switchTo()->window($diff[1])->close();
    }
}
?>

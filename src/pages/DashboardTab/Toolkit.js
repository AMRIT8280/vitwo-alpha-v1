import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Box,Grid, Link } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import {BiArrowBack,BiClipboard, BiSearch,BiCheckSquare} from "react-icons/bi"
import PropTypes from 'prop-types'
import Tabs from '@mui/material/Tabs'
import Tab from '@mui/material/Tab'
import Typography from '@mui/material/Typography'
import APIinfo from '../../images/api-info.png'
function TabPanel(props) {
    const { children, value, index, ...other } = props;
  
    return (
      <div
        role="tabpanel"
        hidden={value !== index}
        id={`vertical-tabpanel-${index}`}
        aria-labelledby={`vertical-tab-${index}`}
        {...other}
      >
        {value === index && (
          <Box sx={{ p: 3 }}>
            <Typography>{children}</Typography>
          </Box>
        )}
      </div>
    );
  }
  
  TabPanel.propTypes = {
    children: PropTypes.node,
    index: PropTypes.number.isRequired,
    value: PropTypes.number.isRequired,
  };
  
  function a11yProps(index) {
    return {
      id: `vertical-tab-${index}`,
      'aria-controls': `vertical-tabpanel-${index}`,
    };
  }
function Toolkit() {
    const classes = useStyles();
    const [value, setValue] = React.useState(0);

    const handleChange = (event, newValue) => {
      setValue(newValue);
    };
      return (
        <Box
          sx={{ flexGrow: 1, bgcolor: 'background.paper', display: 'flex', height: 224 }}
        >
          <Tabs className={classes.Verticaltab}
            orientation="vertical"
            value={value}
            onChange={handleChange}
            aria-label="Vertical tabs example"
            sx={{ borderRight: 1, borderColor: 'divider' }}
          >
            <Tab label="Database Schema Info" {...a11yProps(0)} />
            <Tab label="API Info" {...a11yProps(1)} />
            <Tab label="Other Provider Level Control Switches" {...a11yProps(2)} />
            <Tab label="CCQ Disposition Values" {...a11yProps(3)} />
            <Tab label="Audit Log Parameters & Controls" {...a11yProps(4)} />
          </Tabs>
          <TabPanel value={value} index={0}>
          
          </TabPanel>
          <TabPanel value={value} index={1}>
            <img style={{width:'100%'}} src={APIinfo} alt="api info" />
          </TabPanel>
          <TabPanel value={value} index={2}>
            Item Three
          </TabPanel>
          <TabPanel value={value} index={3}>
            Item Four
          </TabPanel>
          <TabPanel value={value} index={4}>
            Item Five
          </TabPanel>
          
        </Box>
      );
    }

export default Toolkit
const useStyles = makeStyles(() => ({
    pageTop:{
        textAlign:'left',
        '& button':{
            padding:'0px',
            background:'none',
            color:'#919699',
            fontSize:'15px',
            textTransform:'capitalize',
            fontWeight:'500'
        }
    },
    Verticaltab:{
      background:'#F3F3F3',
      height:500,
      width:290,
      minWidth:290,
      marginRight:30,
      '& .Mui-selected':{
        background:'#D9E3F0',
        color:'#000 !important'
      },
      '& .MuiTab-root':{
        height:60,
        textTransform:'capitalize',
        fontSize:16,
        color:'#000',
      }
    },
    backarrow:{
        color:'#7087A7',
        fontSize:'20px',
        marginRight:'8px'
    },
    Toolkit:{
        display:'flex',
        justifyContent:'space-between',
        borderBottom:'1px #E3E5E5 solid',
        paddingBottom:'10px',
        marginBottom:'13px'
    },
    info:{
        color:'#919699',
        fontSize:'12px',
        '& span':{
            color:'#141621',
            fontSize:'16px',
            letterSpacing:'0.496657px'
        }
    },
    nametext:{
        fontSize:'12px',
        color:'#919699',
        margin:'40px 0 0'
    },
    name:{
        fontSize:'20px',
        color:'#141621',
        margin:'0 0 30px'
    },
}));
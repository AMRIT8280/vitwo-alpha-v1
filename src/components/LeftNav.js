import React, {
  useEffect,
  Fragment,
  useCallback,
  useState,
  useRef,
} from "react";
import { makeStyles } from '@material-ui/core/styles'
import { FaMedkit } from "react-icons/fa"
import { Box,Grid, Link } from '@material-ui/core'
import {BiArrowBack,BiClipboard, BiSearch,BiCheckSquare} from "react-icons/bi"
import Accordion from '@material-ui/core/Accordion'
import AccordionDetails from '@material-ui/core/AccordionDetails'
import AccordionSummary from '@material-ui/core/AccordionSummary'
import Typography from '@material-ui/core/Typography'
import ExpandMoreIcon from '@material-ui/icons/ExpandMore'
import { useSelector, useDispatch } from 'react-redux'
import { BiChevronLeft } from 'react-icons/bi'
import { NavLink } from 'react-router-dom'
function LeftNav() {
  const classes = useStyles();
  // Accordion2 //
  const [expanded, setExpanded] = React.useState(false);

  const handleChange = (panel) => (event, isExpanded) => {
    setExpanded(isExpanded ? panel : false);
  };
    return (
        <div>
             <Box className={classes.Accordionnav}>
            
             <Accordion expanded={expanded === 'panel1'} onChange={handleChange('panel1')}>
        <AccordionSummary
          expandIcon={<ExpandMoreIcon />}
          aria-controls="panel1bh-content"
          id="panel1bh-header"
        >
          <Typography className={classes.heading}>General settings</Typography>
          <Typography className={classes.secondaryHeading}>I am an accordion</Typography>
        </AccordionSummary>
        <AccordionDetails>
          <Typography>
            Nulla facilisi. Phasellus sollicitudin nulla et quam mattis feugiat. Aliquam eget
            maximus est, id dignissim quam.
          </Typography>
        </AccordionDetails>
      </Accordion>
      <Accordion expanded={expanded === 'panel2'} onChange={handleChange('panel2')}>
        <AccordionSummary
          expandIcon={<ExpandMoreIcon />}
          aria-controls="panel2bh-content"
          id="panel2bh-header"
        >
          <Typography className={classes.heading}>Users</Typography>
          <Typography className={classes.secondaryHeading}>
            You are currently not an owner
          </Typography>
        </AccordionSummary>
        <AccordionDetails>
          <Typography>
            Donec placerat, lectus sed mattis semper, neque lectus feugiat lectus, varius pulvinar
            diam eros in elit. Pellentesque convallis laoreet laoreet.
          </Typography>
        </AccordionDetails>
      </Accordion>
      <Accordion expanded={expanded === 'panel3'} onChange={handleChange('panel3')}>
        <AccordionSummary
          expandIcon={<ExpandMoreIcon />}
          aria-controls="panel3bh-content"
          id="panel3bh-header"
        >
          <Typography className={classes.heading}>Advanced settings</Typography>
          <Typography className={classes.secondaryHeading}>
            Filtering has been entirely disabled for whole web server
          </Typography>
        </AccordionSummary>
        <AccordionDetails>
          <Typography>
            Nunc vitae orci ultricies, auctor nunc in, volutpat nisl. Integer sit amet egestas eros,
            vitae egestas augue. Duis vel est augue.
          </Typography>
        </AccordionDetails>
      </Accordion>
      <Accordion expanded={expanded === 'panel4'} onChange={handleChange('panel4')}>
        <AccordionSummary
          expandIcon={<ExpandMoreIcon />}
          aria-controls="panel4bh-content"
          id="panel4bh-header"
        >
          <Typography className={classes.heading}>Personal data</Typography>
        </AccordionSummary>
        <AccordionDetails>
          <Typography>
            Nunc vitae orci ultricies, auctor nunc in, volutpat nisl. Integer sit amet egestas eros,
            vitae egestas augue. Duis vel est augue.
          </Typography>
        </AccordionDetails>
      </Accordion>
      </Box>
        </div>
    )
}

export default LeftNav
const drawerWidth = 25;
const useStyles = makeStyles(({ spacing, transitions }) => ({
    Accordionnav:{
        '& .MuiAccordion-root:before':{
          display:'none'
        },
        '& ul':{
          listStyle:'none',
          margin:'0px',
          padding:'0px',
          '& li':{
            fontSize:'15px',
            color:'#141621',
            lineHeight:'40px',
            marginBottom:10,
            '& a':{
              color:'#141621',
              cursor:'pointer',
              '&:hover':{
                color:'#7087A7',
                textDecoration:'none'
              }
            }
          }
        },
        '& .MuiTypography-root':{
          display:'flex',
          alignItems:'center'
        },
        '& .MuiAccordion-root.Mui-expanded':{
          margin:'0px'
        },
        '& .MuiAccordion-rounded':{
          borderBottom:'1px #E3E5E5 solid',
          padding:'10px 0'
        }
      },
      icon:{
        color:'#7087A7',
        fontSize:'20px',
        marginRight:'10px'
      },
      activeNav: {
        background: '#430AE8',
        color:'#fff !important',
        borderRadius:10,
      },
      Leftnavlink: {
        display: 'flex',
        flexDirection: 'row',
        alignItems: 'center',
        color: '#fff',
        height:45,
        width: '100%',
        fontSize: 15,
        paddingLeft: 15,
        textDecoration: 'none',
        justifyContent:'flex-start',
        textTransform:'capitalize',
        borderRadius:10,
        fontFamily:'Poppins'
      },
      content: {
        flexGrow: 1,
        transition: transitions.create('margin', {
          easing: transitions.easing.sharp,
          duration: transitions.duration.leavingScreen,
        }),
        marginLeft: spacing(-1 * drawerWidth),
      },
      navlist: {
        margin: 0,
        padding: '0 0 0 10px',
        listStyle: 'none',
        '& li': {
          display: 'flex',
          flexDirection: 'row',
          alignItems: 'center',
        },
      },
      Navlink: {
        background: '',
      },
      contentShift: {
        transition: transitions.create('margin', {
          easing: transitions.easing.easeOut,
          duration: transitions.duration.enteringScreen,
        }),
        marginLeft: 0,
      }, 
}));
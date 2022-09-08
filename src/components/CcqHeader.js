import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Box,Grid, Link } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import { useTime } from 'react-timer-hook'
import Select from "react-dropdown-select"

function CcqHeader({ options }) {
    const classes = useStyles();
    const {
        seconds,
        minutes,
        hours,
        ampm,
      } = useTime({ format: '12-hour'});
    return (
        <div>
            <Box className={classes.Timercol}>
               
               <Box className={classes.Addcode}>
                <p className={classes.Toptext}>Active Goals</p> 
                <h5 className={classes.Bottomtext}>3</h5>  
                </Box> 
                <Box className={classes.Addcode}>
                <p className={classes.Toptext}>Active Symptoms</p> 
                <h5 className={classes.Bottomtext}>5</h5>  
                </Box>
                <Box className={classes.Program}>
                    <p className={classes.Toptext}>Active Medications</p>
                    <h5 className={classes.Bottomtext}>2</h5>
                </Box>
                <Box className={classes.Addcode}>
                <p className={classes.Toptext}>CCM Providers</p> 
                <h5 className={classes.Bottomtext}>5</h5>  
                </Box>
                <Box className={classes.Addcode}>
                <p className={classes.Toptext}>Last Vitals</p> 
                <h5 className={classes.Bottomtext}>134/78</h5>  
                </Box>
                <Box className={classes.Finalbtn}>
                    <Button className={classes.Finalizebtn}>CCQ</Button>
                </Box>
               </Box>
        </div>
    )
}

export default CcqHeader
const useStyles = makeStyles(() => ({
    Timercol:{
        width:'96%',
        padding:'10px 2%',
        background:'#E6EAF0',
        display:'flex',
        justifyContent:'space-between',
        alignItems:'center'
    },
    Timer:{
        display:'flex',
        alignItems:'center'
    },
    Timertext:{
        fontSize:'14px',
        color:'#919699',
        margin:'0px',
        fontWeight:'normal'
    },
    Playbtn:{
        width:'38px',
        height:'38px',
        background:'#fff',
        borderRadius:'50%',
        display:'flex',
        minWidth:'38px',
    },
    pause:{
        width:'12px',
        height:'12px',
        background:'#000'
    },
    Playpusebtn:{
        marginRight:'10px'
    },
    Finalizebtn:{
        width:'142px',
        background:'#D60D6D',
        borderRadius:'10px',
        color:'#fff',
        boxShadow:'0px 0px 12px 6px rgba(0, 0, 0, 0.18)',
        textTransform:'capitalize',
        '&:hover':{
            background:'#141621'
        }
    },
    select:{
        width:'148px !important',
        height:'40px !important',
        border:'1px solid #AEAEAE !important',
        borderRadius:'10px !important',
        background:'#fff !important',
        '& .css-16cm63-DropDown':{
            width:'100% !important',
            top:'30px !important'
        }
    },
    Timerinfo:{
        '& span':{
            fontSize:'14px'
        }
    },
    Toptext:{
        fontSize:'12px',
        color:'#919699',
        margin:'0px'
    },
    Bottomtext:{
        fontSize:'16px',
        color:'#141621',
        margin:'0px',
        fontWeight:'normal'
    } ,
}));
import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Link } from '@material-ui/core'
import {BiCog,BiErrorCircle,BiHelpCircle, BiBarChartSquare} from "react-icons/bi"

function Setting() {
    const classes = useStyles();
    return (
        <div>
            <ul className={classes.setting}>
                <li><Link to=""><BiBarChartSquare className={classes.icon} /> Insights</Link></li>
                <li><Link to=""><BiCog className={classes.icon} /> Settings</Link></li>
                <li><Link to=""><BiErrorCircle className={classes.icon} /> What’s new?</Link></li>
                <li><Link to=""><BiHelpCircle className={classes.icon} /> Customers Support</Link></li>
            </ul>
        </div>
    )
}

export default Setting
const useStyles = makeStyles(() => ({
    setting:{
        listStyle:'none',
        margin:'0',
        padding:'0',
        textAlign:'left',
        '& li':{
            height:'30px',
            fontSize:'14px',
            color:'#000',
            '& a':{
                color:'#000', 
                display:'flex',
                alignItems:'center',
                cursor:'pointer',
                '&:hover':{
                    textDecoration:'none'
                }
            }
        }
    },
    icon:{
        fontSize:'18px',
        color:'#78909C',
        marginRight:'10px'
    }  
}));
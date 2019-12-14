#!/bin/sh
### BEGIN INIT INFO
# Provides:          industry-starttimer.sh
# Required-Start:    mountkernfs
# Required-Stop:
# X-Start-Before:    checkroot
# Default-Start:     S
# Default-Stop:
# X-Interactive:     true
# Short-Description: Set the console keyboard layout
# Description:       Set the console keyboard as early as possible
#                    so during the file systems checks the administrator
#                    can interact.  At this stage of the boot process
#                    only the ASCII symbols are supported.
### END INIT INFO

if [ -f /bin/setupcon ]; then
    case "$1" in
        stop|status)
        # console-setup isn't a daemon
        ;;
        start|force-reload|restart|reload)
            if [ -f /var/www/industryApi/public/StartTimer.php ]; then
                php /var/www/industryApi/public/StartTimer.php start -d
            else
                log_action_begin_msg () {
	            echo -n "$@... "
                }

                log_action_end_msg () {
	            if [ "$1" -eq 0 ]; then
	                echo done.
	            else
	                echo failed.
	            fi
                }
            fi
	    log_action_begin_msg "Setting up StartTimer layout"
            if /lib/modules/industry-starttimer.sh; then
	        log_action_end_msg 0
	    else
	        log_action_end_msg $?
	    fi
	    ;;
        *)
            echo 'Usage: /etc/init.d/industry-starttimer {start|reload|restart|force-reload|stop|status}'
            exit 3
            ;;
    esac
fi
